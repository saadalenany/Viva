<?php

namespace App\Http\Controllers;

use App\Libraries\SharedFunctions;
use App\models\ManualInvoice;
use App\models\ManualTransaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    public function getInvoicesManualShow($id){
        $item = ManualInvoice::where('id', $id)->first();
        $data['trnAmount'] = $item->amount;
        $data['totalAmount'] = $item->amount;
        $data['taxVal'] = 0;
        $data['subTotalVal'] = $item->amount;
        $data['itemName'] = 'Room Reservation';
        $data['itemDesc'] = $item->amount_for;;

        return View::make('payment.manual-invoice', compact('item', 'data'));
    }

    public function getInvoicesManualPurchase(){
        $data = Input::all();
        //print_r($data); die;
        /// Save Tokenization
        $transaction = ManualTransaction::create($data);
        $invoice = $transaction->invoice;

        $customer_ip = $_SERVER['REMOTE_ADDR'];
        $returnURL = action('PaymentController@getInvoicesManualResult');
        $merchant_identifier = 'ErHRHExY';
        $sha_request_phrase = 'BTFRCGHCV'; //'BTFRCghc7v';
        $access_code = 'vLVA4VcQvcIxcWUV28ko';
        $payfortURL = 'https://paymentservices.payfort.com/FortAPI/paymentApi'; //'https://sbpaymentservices.payfort.com/FortAPI/paymentApi';

        $requestParams = array(
            'access_code' => $access_code, //'mGwuytxwMBE4lJCIlnl5' ,
            'amount' => round($invoice->amount, 0), //'1000',
            'command' => 'PURCHASE',
            'currency' => $invoice->currency, //'EGP',
            'customer_email' => $invoice->email, //'mahmoud.h26@gmail.com',
            'customer_ip'=>$customer_ip,
            'language' => 'en',
            'merchant_identifier' => $merchant_identifier,//'dAQlHKed',
            'merchant_reference' => Input::get('merchant_reference'), //'s2b3rj1vrjrhc1x',
            'return_url'=> $returnURL, //'http://localhost/viva/payment/payfort-response',
//            'service_command'=>'TOKENIZATION',
            'token_name'=> Input::get('token_name'), //'gftbbvfdt'
            //'order_description' => 'Item',
            //'signature' => 'a9b02b3ebb8355d4444695a4c3f6be83d11328c9a2001fa528ab7210dc443333',
        );

        $signText = $sha_request_phrase; //'TESTSHAIN';
        foreach($requestParams as $k=>$val){
            $signText.=$k.'='.$val;
        }
        $signText.=$sha_request_phrase; //'TESTSHAIN';

        $signature = hash('sha256', $signText, false);
        $requestParams['signature'] = $signature;
        $redirectUrl = $payfortURL;

        // Setup cURL
        $ch = curl_init($redirectUrl);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                //'Authorization: '.$authToken,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($requestParams)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Print the date from the response
//        print_r($responseData);

        if(array_has($responseData, "3ds_url")){
            return Redirect::to($responseData["3ds_url"]);
        }

//        return response($responseData, 200)
//            ->header('Content-Type', 'application/json');
        if(strtolower(Input::get('response_message')) != 'success'){
            $invoice->merchant_reference = str_random(16);
            $invoice->save();
        }

        return View::make('payment.manual-result', compact('transaction', 'invoice'));
    }

    public function getInvoicesManualResult(){
        $data = Input::all();
        $data['service_command'] = Input::get('command', null);
        /// Save Tokenization
        $transaction = ManualTransaction::create($data);
        $invoice = $transaction->invoice;
        if(strtolower(Input::get('response_message')) != 'success'){
            $invoice->merchant_reference = str_random(16);
            $invoice->status = 3;
        }else{
            $invoice->status = 2;
        }
        $invoice->save();

        if(strtolower(Input::get('response_message')) == 'success'){
            //////////// SENDING EMAILS
            $emailData = [];
            $emailData ['name'] = $invoice->name;
            $emailData ['cardNum'] = $transaction->card_number;
            $emailData ['email'] = $invoice->email;
            $emailData ['phone'] = $invoice->phone;
            //// Required for both
            $emailData ['order_id'] = $invoice->id;
            $emailData ['transaction_id'] = $transaction->id;
            $emailData ['date'] = $transaction->created_at->toDateString();
            $emailData ['total'] = $invoice->amount;
            $emailData ['currency'] = $invoice->currency;
            ////
            $emailData ['subtotal'] = $invoice->amount;
            $emailData ['item'] = trans('payment.item_name');
            $emailData ['desc'] = $invoice->amount_for;;

            SharedFunctions::sendEmailTo('emails.invoice', $invoice->email,
                trans('payment.email.title'), $emailData);
        }

        return View::make('payment.manual-result', compact('transaction', 'invoice'));
    }



    public function getPayfort(){
        return View::make('payment.test');
    }


    public function getMerchantPage(){
//        print_r(Input::all());

        $customer_ip = $_SERVER['REMOTE_ADDR'];

        $requestParams = array(
            'access_code' => 'mGwuytxwMBE4lJCIlnl5' ,
            'amount' => '1000',
            'command' => 'PURCHASE',
            'currency' => 'EGP',
            'customer_email' => 'mahmoud.h26@gmail.com',
            'customer_ip'=>$customer_ip,
            'language' => 'en',
            'merchant_identifier' => 'dAQlHKed',
            'merchant_reference' => Input::get('merchant_reference'), //'s2b3rj1vrjrhc1x',
            'return_url'=>'http://localhost/viva/payment/payfort-response',
//            'service_command'=>'TOKENIZATION',
            'token_name'=> Input::get('token_name'), //'gftbbvfdt'
            //'order_description' => 'Item',
            //'signature' => 'a9b02b3ebb8355d4444695a4c3f6be83d11328c9a2001fa528ab7210dc443333',
        );

        $signText = 'TESTSHAIN';
        foreach($requestParams as $k=>$val){
            $signText.=$k.'='.$val;
        }
        $signText.='TESTSHAIN';
        $signature = hash('sha256', $signText, false);
        $requestParams['signature'] = $signature;
        $redirectUrl = 'https://sbpaymentservices.payfort.com/FortAPI/paymentApi';

        // Setup cURL
        $ch = curl_init($redirectUrl);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                //'Authorization: '.$authToken,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($requestParams)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Print the date from the response
//        print_r($responseData);

        if(array_has($responseData, "3ds_url")){
            return Redirect::to($responseData["3ds_url"]);
        }

        return response($responseData, 200)
            ->header('Content-Type', 'application/json');

    }

    public function getPayfortResponse(){
        print_r(Input::all());

    }

}
