<?php

namespace App\Http\Controllers;

use App\models\City;
use App\models\Hotel;
use App\models\HotelAmenities;
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

    public function payment(Request $request){
        $num = $request->input('p');

        $hot = Hotel::where('id', $num)->with('media')->get();

        return View::make('home.payment',compact("hot","num"));
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

    public function confirm(){
        return View::make('home.confirm');
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

    public function filterHotels(){
        $amenity = $_REQUEST["amenity"];
        $start_price = $_REQUEST["start_price"];
        $end_price = $_REQUEST["end_price"];
        $stars = $_REQUEST["stars"];

        $hotels = Hotel::with('media')->get();

        if ($stars != "All"){
            $hotels = Hotel::where('stars',$stars)->with('media')->get();
        }
        if ($amenity != "All"){
            $hotels = Hotel::with('hotel_amenities')->where('name',$amenity)->get();
        }
        if ($start_price != ""){
            $hotels = Hotel::where('min_price',$start_price)->with('media')->get();
        }
        if ($end_price != ""){
            $hotels = Hotel::where('max_price',$end_price)->with('media')->get();
        }

        return json_encode($hotels);
    }
}
