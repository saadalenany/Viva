<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/08/18
 * Time: 05:03 م
 */

use App\models\Hotel;

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

echo json_encode($hotels);
