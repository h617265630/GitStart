<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Braintree_CreditCard;
use Braintree_Subscription;
use Braintree_Transaction;
use Braintree_Customer;
use Braintree_WebhookNotification;
use Illuminate\Support\Facades\Input;
use Braintree_Gateway;
use Braintree_ClientToken;
class PaymentController extends CommonController
{


    public function getPayment()
    {
        $clientToken = Braintree_ClientToken::generate();
        return view('home.payment',compact('clientToken'));
    }

    public function pay()
    {
        $input=Input::all();
        if(!$input['payment_method_nonce'])
        {
            return back();
        }
        else
        {
            $result=Braintree_Transaction::sale(
                [
                    'amount'=>12.25,
                    'paymentMethodNonce' =>'fake-valid-nonce',
                    'options'=>[
                        'submitForSettlement'=>true
                    ]
                ]
            );
            dd($result);
        }
    }
    public function settle()
    {
        $setresult = Braintree_Transaction::submitForSettlement();

        if ($setresult->success) {
            $settledTransaction = $setresult->transaction;
            dd($settledTransaction);
            $data=['status'=>'1','paymethod'=>'creditcard'];
            return $data;
        } else {
            print_r($setresult->errors);
        }
    }

    public function getCardToken($customer_id,$cardNumber,$cardExpiry,$cardCVC)
    {
        $card_result = Braintree_CreditCard::create(array(
            //'cardholderName' => mysql_real_escape_string($_POST['full_name']),
            'number' => $cardNumber,
            'expirationDate' => trim($cardExpiry),
            'customerId' => $customer_id,
            'cvv' => $cardCVC
        ));
        if($card_result->success)
        {
            return $card_result->creditCard->token;
        }
        else {
            return false;
        }
    }

    public function addOrder()
    {
        $input = Input::all();
        $subscribed= false;
        if(isset($input['subscribed']))
        {
            $subscribed= true;
        }
        $customer_id = $this->registerUserOnBrainTree();
        echo 'customer id - '.$customer_id;/// Create card token
        $card_token = $this->getCardToken($customer_id,$input['cardNumber'],$input['cardExpiry'],$input['cardCVC']);
        echo 'card_token - '.$card_token;
/// gateway will provide this plan id whenever you creat plans there
        $plan_id = 'gq8b';
        $transction_id = $this->createTransaction($card_token,$customer_id,$plan_id,$subscribed);
        dd($transction_id);
    }
    public function registerUserOnBrainTree() {
        $result = Braintree_Customer::create(array(
            'firstName' => 'jie',
            'lastName' => 'huang',
            'email' => '617265630@qq.com',
            'phone' => '0422676350'
        ));
        if ($result->success) {
            return $result->customer->id;
        } else {
            $errorFound = '';
            foreach ($result->errors->deepAll() as $error) {
                $errorFound .= $error->message . "<br />";
            }
            echo $errorFound ;
        }
    }
    public function createTransaction($creditCardToken,$customerId,$planId,$subscribed){
        if($subscribed)
        {
            $subscriptionData = array(
                'paymentMethodToken' => $creditCardToken,
                'planId' => $planId
            );
            $this->cancelSubscription();
            $subscription_result = Braintree_Subscription::create($subscriptionData);
            echo 'Subscription id'. $subscription_result->subscription->id;
        }
        else {
            $this->cancelSubscription();
        }
        $result = Braintree_Transaction::sale(
            [
                'customerId' => $customerId,
                'amount' => 20,
                'orderId' => '131231'
            ]
        );
        if ($result->success) {
            return $result->transaction->id;
        } else {
            $errorFound = '';
            foreach ($result->errors->deepAll() as $error1) {
                $errorFound .= $error1->message . "<br />";
            }
        }
    }
    public function cancelSubscription()
    {
        $gateway_subscription_id = '';
        if($gateway_subscription_id!='')
        {
            Braintree_Subscription::cancel($gateway_subscription_id);
        }
    }
    
    public function subscription()
    {
        try{
            if(isset($_POST["bt_signature"]) && isset($_POST["bt_payload"])) {
                $webhookNotification = Braintree_WebhookNotification::parse(
                    $_POST["bt_signature"], $_POST["bt_payload"]
                );// $message =
// "[Webhook Received " . $webhookNotification->timestamp->format('Y-m-d H:i:s') . "] "
// . "Kind: " . $webhookNotification->kind . " | "
// . "Subscription: " . $webhookNotification->subscription->id . "\n";Log::info("msg " . Log::info("subscription " . json_encode($webhookNotification->subscription));
                Log::info("transactions " . json_encode($webhookNotification->subscription->transactions));
                Log::info("transactions_id " . json_encode($webhookNotification->subscription->transactions[0]->id));
                Log::info("customer_id " . json_encode($webhookNotification->subscription->transactions[0]->customerDetails->id));
                Log::info("amount " . json_encode($webhookNotification->subscription->transactions[0]->amount));
            }
        }
        catch (\Exception $ex) {
            Log::error("PaymentController::subscription() " . $ex->getMessage());
        }
    }
}
