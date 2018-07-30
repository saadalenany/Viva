<?php

namespace App\Http\Controllers;

use App\models\City;
use App\models\Hotel;
use App\models\Media;
use App\models\RoomDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class HomeController extends Controller{

    public function index(){
        //$hotelsIDs = Hotel::where('isOffer', 1)->pluck('id')->get()->toArray();
        $offers = RoomDetails::where('is_offer', 1)->with('hotel')->with('media')->get();

        $cities = City::with('country')->where('countries_code', 7)->get();

        return View::make('home.index', compact('offers', 'cities', 'images'));
    }

    public function payment(){
        return View::make('home.payment');
    }

    public function room(){
        return View::make('home.room');
    }

    public function contact(){
        return View::make('home.contact');
    }

    public function confirm(){
        return View::make('home.confirm');
    }

    public function booking(Request $request){
        $num = $request->input('p');

        $hotels = Hotel::with('media')->get();

        return View::make('home.booking', compact('hotels','num'));
    }

    public function blog(){
        return View::make('home.blog');
    }

    public function about(){
        return View::make('home.about');
    }

}
