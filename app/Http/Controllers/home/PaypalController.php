<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Braintree_Gateway;
use Braintree_Transaction;
use Braintree_PaymentMethodNonce;
use Illuminate\Support\Facades\Input;
class PaypalController extends CommonController
{
    public function tran()
    {
        $input=Input::all();
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));
       $result=$gateway->transaction()->sale(
           [
            'amount'=>'10.00',
               'option'=>[
                   'submitForSettlement'=>True
               ]
           ]);
    }

    public function trytran()
    {
        $input=Input::all();
        dd($input);
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));
        $result = $gateway->transaction()->sale([
            "amount" =>100,
            "paymentMethodNonce" => "fake-paypal-one-time-nonce",
        ]);
        if ($result->success) {

            print_r("Success ID: " . $result->transaction->id);
            //return view('home.paysuccess');
        } else {
            print_r("Error Message: " . $result->message);
        }

    }
    public function gateway()
    {
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));

        $clientToken = $gateway->clientToken()->generate();
        echo ($clientToken);
        $input=Input::all();
        $nonce=$input['payment_method_nonce'];
        dd($nonce);
    }
    public function getPayment()
    {
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));

        $clientToken = $gateway->clientToken()->generate();

        return view('home.payment',compact('clientToken'));
    }
    public function createtransaction()
    {
        $gateway = new Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$rzmtygw3d34hkh7y$21a4218c37376454300e886348e79ff3',
        ));
        $input=Input::all();
        $result = $gateway->transaction()->sale([
            "amount" => $input['amount'],
            "merchantAccountId" => "AUD",
            "paymentMethodNonce" =>$input['payment_method_nonce'],
            "orderId" =>$input['PayPal_Invoice_Number'],
            "descriptor"=>[
                "name"=>"Descriptor displayed in customer CC statements char max"
            ],
            "shipping"=>[
                "firstName" => "Jen",
                "lastName"=>"Smith",
                "company"=>"Braintr",
                "streetAddress"=>"1 E 1st St",
                "extendedAddress"=>"Suite 403",
                "locality" =>"Barlett",
                "region"=>"IL",
                "postalCode"=>"60103",
                "countryCodeAlpha2" =>"US"
            ],
            "options"=>[
                "paypal"=>[

                ],
            ]
        ]);
        dd($result);
        if($result->success)
        {
            print_r("Success ID:".$result->transaction->id);
            //seller protection
            $transaction = $gateway->transaction()->find('the_transaction_id');

            $transaction->paypalDetails->sellerProtectionStatus;
        }else
        {
            print_r("Error Message:".$result->message);
        }
    }
}
