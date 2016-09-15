<?php

namespace Cart\Controllers;
use Slim\Router;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterFace as Response;
use Psr\Http\Message\ServerRequestInterFace as Request;
use Cart\Models\Product;
use Cart\Basket\Basket;
use Cart\Validation\Contracts\ValidatorInterface;
use Cart\Validation\Validator;
use Cart\Validation\Forms\OrderForm;
use Cart\Models\Customer;
use Cart\Models\Address;
use Braintree_Transaction;
use Cart\Models\Order;
class OrderController
{
    protected $basket;
    protected $router;
    protected $validator;
    public function __construct(Basket $basket,Router $router,ValidatorInterface $validator)
    {
        $this->basket=$basket;
        $this->router=$router;
        $this->validator=$validator;
    }
    public function index(Request $request,Response $response,Twig $view)
    {
        $this->basket->refresh();
        return $view->render($response,'order/index.twig');
        if(!$this->basket->subTotal)
        {
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }
    }

    public function create(Request $request,Response $response,Customer $customer,Address $address)
    {
        $this->basket->refresh();
        if(!$this->basket->subTotal())
        {
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }

        if(!$request->getParams('payment_method_nonce')){
            return $response->withRedirect($this->router->pathFor('order.index'));
        }
        $validation = $this->validator->validate($request,OrderForm::rules());

        if($validation->fails())
        {
            return $response->withRedirect($this->router->pathFor('order.index'));
        }

        $hash = bin2hex(random_bytes(32));
        $customer = $customer->firstOrCreate([
            'email'=>$request->getParam('email'),
            'name'=>$request->getParam('name'),
        ]);
        $address=$address->firstOrCreate([
            'address1'=>$request->getParam('address1'),
            'address2'=>$request->getParam('address2'),
            'city'=>$request->getParam('city'),
            'postal_code'=>$request->getParam('postal_code'),
        ]);
        $order=$customer->order()->create([
            'hash'=>$hash,
            'paid'=>false,
            'total'=>$this->basket->subTotal()+5,
            'address_id'=>$address->id,
        ]);
        $order->products()->saveMany(
            $this->basket->all(),
            $this->getQuantities($this->basket->all())
        );

        $result = Braintree_Transaction::sale([
            'amount'=>$this->basket->subTotal()+5,
            'paymentMethodNonce'=>$request->getParam('payment_method_nonce'),
            'options'=>[
                'submitForSettlement'=>true,
            ]
        ]);
        $event = new \Cart\Events\OrderWasCreated($order,$this->basket);

        if(!$result->success)
        {
            $event->attach(new \Cart\Handlers\RecordFailedPayment);
            $event->dispatch();
            return $response->withRedirect($this->router->pathFor('order.index'));
        }
        $event->attach([
            new \Cart\handlers\MarkOrderPaid,
            new \Cart\handlers\RecordSuccessfulPayment($result->transaction->id),
            new \Cart\handlers\UpdateStock,
            new \Cart\handlers\EmptyBasket,
        ]);
        $event->dispatch();
        return $response->withRedirect($this->router->pathFor('order.show',['hash'=>$hash]));
    }
    protected function getQuantities($items){
        $quantities=[];
        foreach($items as $item)
        {
            $quantities[]=['quantity'=>$item->quantity];
        }
        return $quantities;
    }

    public function show($hash,Request $request,Response $response,Twig $view,Order $order)
    {
        $order = $order->with(['address','products'])->where('hash',$hash)->first();
        if(!$order){
            return $response->withRedirect($this->router->pathFor('home'));
        }
        return $view->render($response,'order/show.twig',['order'=>$order]);
    }
}