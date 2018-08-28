<?php

namespace App\Http\Controllers;

use App\models\City;
use App\models\CreditCardUser;
use App\models\Hotel;
use App\models\HotelAmenities;
use App\models\Media;
use App\models\RoomDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class HomeController extends Controller{

    public function index(){
        //$hotelsIDs = Hotel::where('isOffer', 1)->pluck('id')->get()->toArray();
        $offers = RoomDetails::where('is_offer', 1)->with('hotel')->with('media')->get();

        $cities = City::with('country')->where('countries_code', 7)->get();

        return View::make('home.index', compact('offers', 'cities', 'images'));
    }

    public function payment(Request $request){
        $id = $request->input('id');

        $hot = Hotel::where('id' ,$id)->with('media')->get()[0];
        $jsonChecked = $request->input('room_checked');

        $room_checked = [];

        for ($i =0 ; $i< count($jsonChecked); $i++){
            $room_checked[$i] = json_decode($jsonChecked[$i]);
        }

        $total = 0;
        for ($i =0; $i < count($room_checked) ; $i++){
            $total += $room_checked[$i]->price_per_night;
        }

        return View::make('home.payment',compact("hot","room_checked","total"));
    }

    public function room(Request $request){
        $id = $request->input('id');

        $hot = Hotel::where('id' ,$id)->with('media')->get();

        $hotel_amenities = HotelAmenities::where('hotels_id' ,$id)->get();

        $room_amenities = RoomDetails::where('hotels_id' ,$id)->with('room_amenities')->get();

        return View::make('home.room', compact('hot','hotel_amenities', 'room_amenities'));
    }

    public function contact(){
        return View::make('home.contact');
    }

    public function confirm(Request $request){

        $total = $request->input('total');
        $id = $request->input('id');

        $hot = Hotel::where('id' ,$id)->with('media')->get()[0];

        $inputName = $request->input('inputName');
        $inputMobile = $request->input('inputMobile');
        $inputEmail = $request->input('inputEmail');
        $inputComments = $request->input('inputComments');

        $inputCardName = $request->input('inputCardName');
        $inputCardNumber = $request->input('inputCardNumber');
        $inputCardMonth = $request->input('inputCardMonth');
        $inputCardYear = $request->input('inputCardYear');
        $inputCardSecure = $request->input('inputCardSecure');

        if ($inputName==null){$inputName='';}
        if ($inputMobile==null){$inputMobile='';}
        if ($inputEmail==null){$inputEmail='';}
        if ($inputComments==null){$inputComments='';}
        if ($inputCardName==null){$inputCardName='';}
        if ($inputCardNumber==null){$inputCardNumber=0;}
        if ($inputCardMonth==null){$inputCardMonth=1;}
        if ($inputCardYear==null){$inputCardYear=2000;}
        if ($inputCardSecure==null){$inputCardSecure='';}

        $creditCardUser = new CreditCardUser($inputName,
                                             $inputMobile,
                                             $inputEmail,
                                             $inputComments,
                                             $inputCardName,
                                             (int)$inputCardNumber,
                                             (int)$inputCardMonth,
                                             (int)$inputCardYear,
                                             $inputCardSecure);

        $customer_ip = $_SERVER['REMOTE_ADDR'];

        $requestParams = array(
            'access_code' => 'mGwuytxwMBE4lJCIlnl5' ,
            'amount' => $total,
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

        $resdata = response($responseData, 200)
            ->header('Content-Type', 'application/json');

        $jsonChecked = json_decode($request->input('room_checked'));

        $room_checked = [];

        for ($i =0 ; $i< count($jsonChecked); $i++){
            $room_checked[$i] = $jsonChecked[$i];
        }

//        echo $response;
//        die;
        $tax = 50;
        return View::make('home.confirm',compact("total","room_checked","hot","tax","creditCardUser","responseData"));
    }

    public function booking(Request $request){
        $num = $request->input('p');

        $hotel_amenities = HotelAmenities::with('amenities')->get();
        $max = count(Hotel::get());

        $hotels = Hotel::with('media')->skip(($num-1)*10)->take(10)->get();

        return View::make('home.booking', compact('hotels','num', 'max', 'hotel_amenities'));
    }

    public function blog(){
        return View::make('home.blog');
    }

    public function about(){
        return View::make('home.about');
    }

    public function filterHotels(Request $request){

        $amenity = $request->input("amenity");
        $start_price = $request->input("start_price");
        $end_price = $request->input("end_price");
        $stars = $request->input("stars");

        $hotels = Hotel::with('media')->get();

        if ($stars != "All"){
            $hotels = Hotel::where('stars',(int)$stars)->with('media')->get();
        }
        if ($amenity != "All"){
//            $hotels = DB::select( DB::raw("SELECT * FROM `hotels` JOIN `hotel_amenities` WHERE `hotels`.`id` = `hotel_amenities`.`hotels_id` AND `hotel_amenities`.`name` = :amenity"), array(
//                'amenity' => $amenity,
//            ));

//            $hotels = DB::table('hotels')
//                        ->join('hotel_amenities','hotels.id','=','hotel_amenities.hotels_id')
//                        ->join('media','hotels.id','=','media.hotels_id')
//                        ->select('hotels.*','media.*')
//                        ->get();
        }
        if ($start_price != ""){
            $hotels = Hotel::where('min_price',(int)$start_price)->with('media')->get();
        }
        if ($end_price != ""){
            $hotels = Hotel::where('max_price',(int)$end_price)->with('media')->get();
        }

        $hotel_amenities = HotelAmenities::with('amenities')->get();

        return View::make('home.filter', compact('hotels', 'hotel_amenities'));
    }
}
