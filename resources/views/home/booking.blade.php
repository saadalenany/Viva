<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 01:46 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content" id="hotel">
        <!-- About Header -->
        <div class="hotel-header">
            <h1 class="text-center">اختيار الفندق</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- Search -->
        <div class="search">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <img src="{{ asset('images/location-icon.png') }}">
                            <span>القاهرة - مصر</span>
                        </div>
                        <div class="pull-left">
                            <nav class="arrange">
                                <a href="#" class="active"><img src="{{ asset('images/blocks-icon.png') }}"></a>
                                <a href="#"><img src="{{ asset('images/rows-icon.png') }}"></a>
                                <a href="#"><img src="{{ asset('images/location-arr-icon.png') }}"></a>
                            </nav>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="result">
                            <div class="text-center">
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>وسائل الراحة</label><br>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>الحد الادنى للسعر</label><br>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>الحد الاقصى للسعر</label><br>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>عدد النجوم</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/filter" method="get">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <select name="amenities" id="amenities">
                                        <option>All</option>
                                        @foreach($hotel_amenities as $amenity)
                                            <option>{{$amenity->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <input type="number" name="start_price" id="start_price" min="0" step="10" placeholder="Price in USD" style="padding:10px; height:40px;"/>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <input type="number" name="end_price" id="end_price" min="0" step="10" placeholder="Price in USD" style="padding:10px; height:40px;"/>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <select name="stars" id="stars">
                                        <option>All</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary pull-left" style="width: 100%;margin-bottom: 10px;" type="submit" value="Search"/>
                    </div>
                </form>
            </div>
        </div><!-- End Search -->

        <!-- Result -->
        <div class="search-result">
            <div class="container">
                <div class="row">

                    @for($i = 0 ; $i < count($hotels) ; $i++)
                        @if(count($hotels) == $i)
                            @break
                        @else
                            <div class="col-md-4 col-sm-6 pull-right">
                                <div class="thumbnail">
                                    <div id="carousel-example-generic-1" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @for($j=0 ; $j < count($hotels[$i]->media) ; $j++)
                                                @if($j == 0)
                                                    <div class="item active">
                                                        <img id="active_hotel_image" src="{{$hotels[$i]->media[$j]->filename}}" onerror="imgError(this)" alt="Unloaded Image..."/>
                                                    </div>
                                                @else
                                                    <div class="item">
                                                        <img id="inactive_hotel_image" src="{{$hotels[$i]->media[$j]->filename}}" onerror="imgError(this)" alt="Unloaded Image..."/>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic-1" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic-1" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="five-stars">
                                            @for($j=0 ; $j < $hotels[$i]->stars ; $j++)
                                                <img id="hotel_star_image" src="{{ asset('images/star.png') }}" alt="Fondoq">
                                            @endfor
                                        </div>
                                        <h5 id="hotel_name">{{$hotels[$i]->name}}</h5>
                                        <p id="hotel_address">{{$hotels[$i]->address}}</p>
                                        <p><a id="hotel_room_ref" href="/room?id={{$hotels[$i]->id}}" class="btn btn-primary pull-left" role="button">احجز الان</a> <span class="pull-right" id="hotel_max_price">{{$hotels[$i]->max_price}}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor

                </div>
            </div>
        </div><!-- End Result -->

        <!-- Pagination -->
        <div class="pagination">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <span class="page">الصفحة {{$num}} من {{ ceil($max/10) }}</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <nav class="page-navigation">
                            @if($num > 1)
                                <a id="prev_page" href="/booking?p={{$num-1}}">{{$num-1}}</a>
                            @endif
                            <a id="curr_page" href="/booking?p={{$num}}" class="active">{{$num}}</a>
                            @if(ceil($max/10) > $num)
                                <a id="next_page" href="/booking?p={{$num+1}}">{{$num+1}}</a>
                            @endif
                        </nav>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <span class="page">10 من {{$max}} فندق</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pagination -->

    </div><!-- END CONTENT -->
    {{--@section("hotelsearch")--}}
        {{--<script type="text/javascript">--}}
            {{--$(document).ready(function(){ /* PREPARE THE SCRIPT */--}}
                {{--console.log("Inside JQ");--}}
                {{--$("#amenities").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */--}}
                    {{--console.log("Inside amenities");--}}
                    {{--var amenity = $("#amenities").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var start_price = $("#start_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var end_price = $("#end_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var stars = $("#stars").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}

                    {{--$.ajax({ /* THEN THE AJAX CALL */--}}
                        {{--type: "GET", /* TYPE OF METHOD TO USE TO PASS THE DATA */--}}
                        {{--url: "{{ action('HomeController@filterHotels') }}", /* PAGE WHERE WE WILL PASS THE DATA */--}}
                        {{--data: {--}}
                            {{--p: 1,--}}
                            {{--ajax: true,--}}
                            {{--amenity: amenity,--}}
                            {{--start_price: start_price,--}}
                            {{--end_price: end_price,--}}
                            {{--stars: stars--}}
                        {{--}, /* THE DATA WE WILL BE PASSING */--}}
                        {{--success: function(result){ /* GET THE TO BE RETURNED DATA */--}}
                            {{--console.log("Success "+result);--}}
                            {{--var count = Object.keys(result).length;--}}
                            {{--for(var i = 0 ; i < count ; i++){--}}
                                {{--if(count === i){--}}
                                    {{--break;--}}
                                {{--} else {--}}
                                    {{--var mcount = Object.keys(result[i].media).length;--}}
                                    {{--for (var j = 0; j < mcount; j++) {--}}
                                        {{--if (j == 0) {--}}
                                            {{--$("#active_hotel_image").attr("src", result[i].media[j].filename);--}}
                                        {{--}--}}
                                        {{--else {--}}
                                            {{--$("#inactive_hotel_image").attr("src", result[i].media[j].filename);--}}
                                        {{--}--}}
                                    {{--}--}}

                                    {{--for (j = 0; j < result[i].stars; j++) {--}}
                                        {{--$("#hotel_star_image").attr("src", "{{ asset('images/star.png') }}");--}}
                                    {{--}--}}
                                    {{--document.getElementById("hotel_name").innerHTML = result[i].name;--}}
                                    {{--document.getElementById("hotel_address").innerHTML = result[i].address;--}}
                                    {{--$("#hotel_room_ref").attr("href", "/room?id=" + result[i].id);--}}
                                {{--}--}}
                            {{--}--}}

                            {{--$("#curr_page").attr("href", "#");--}}
                            {{--$("#prev_page").remove();--}}
                            {{--$("#next_page").remove();--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}

                {{--$('#start_price').keypress(function(e){--}}
                    {{--if(e.keyCode==13){--}}
                        {{--var amenity = $("#amenities").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var start_price = $("#start_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var end_price = $("#end_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var stars = $("#stars").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}

                        {{--$.ajax({ /* THEN THE AJAX CALL */--}}
                            {{--type: "GET", /* TYPE OF METHOD TO USE TO PASS THE DATA */--}}
                            {{--url: "{{ action('HomeController@filterHotels') }}", /* PAGE WHERE WE WILL PASS THE DATA */--}}
                            {{--data: {--}}
                                {{--p: 1,--}}
                                {{--ajax: true,--}}
                                {{--amenity: amenity,--}}
                                {{--start_price: start_price,--}}
                                {{--end_price: end_price,--}}
                                {{--stars: stars--}}
                            {{--}, /* THE DATA WE WILL BE PASSING */--}}
                            {{--success: function(result){ /* GET THE TO BE RETURNED DATA */--}}
                                {{--console.log("Success "+result);--}}
                                {{--var count = Object.keys(result).length;--}}
                                {{--for(var i = 0 ; i < count ; i++){--}}
                                    {{--if(count === i){--}}
                                        {{--break;--}}
                                    {{--} else {--}}
                                        {{--var mcount = Object.keys(result[i].media).length;--}}
                                        {{--for (var j = 0; j < mcount; j++) {--}}
                                            {{--if (j == 0) {--}}
                                                {{--$("#active_hotel_image").attr("src", result[i].media[j].filename);--}}
                                            {{--}--}}
                                            {{--else {--}}
                                                {{--$("#inactive_hotel_image").attr("src", result[i].media[j].filename);--}}
                                            {{--}--}}
                                        {{--}--}}

                                        {{--for (j = 0; j < result[i].stars; j++) {--}}
                                            {{--$("#hotel_star_image").attr("src", "{{ asset('images/star.png') }}");--}}
                                        {{--}--}}
                                        {{--document.getElementById("hotel_name").innerHTML = result[i].name;--}}
                                        {{--document.getElementById("hotel_address").innerHTML = result[i].address;--}}
                                        {{--$("#hotel_room_ref").attr("href", "/room?id=" + result[i].id);--}}
                                    {{--}--}}
                                {{--}--}}

                                {{--$("#curr_page").attr("href", "#");--}}
                                {{--$("#prev_page").remove();--}}
                                {{--$("#next_page").remove();--}}
                            {{--}--}}
                        {{--});--}}
                    {{--}--}}
                {{--});--}}

                {{--$('#end_price').keypress(function(e){--}}
                    {{--if(e.keyCode==13){--}}
                        {{--var amenity = $("#amenities").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var start_price = $("#start_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var end_price = $("#end_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                        {{--var stars = $("#stars").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}

                        {{--$.ajax({ /* THEN THE AJAX CALL */--}}
                            {{--type: "GET", /* TYPE OF METHOD TO USE TO PASS THE DATA */--}}
                            {{--url: "{{ action('HomeController@filterHotels') }}", /* PAGE WHERE WE WILL PASS THE DATA */--}}
                            {{--data: {--}}
                                {{--p: 1,--}}
                                {{--ajax: true,--}}
                                {{--amenity: amenity,--}}
                                {{--start_price: start_price,--}}
                                {{--end_price: end_price,--}}
                                {{--stars: stars--}}
                            {{--}, /* THE DATA WE WILL BE PASSING */--}}
                            {{--success: function(result){ /* GET THE TO BE RETURNED DATA */--}}
                                {{--console.log("Success "+result);--}}
                                {{--var count = Object.keys(result).length;--}}
                                {{--for(var i = 0 ; i < count ; i++){--}}
                                    {{--if(count === i){--}}
                                        {{--break;--}}
                                    {{--} else {--}}
                                        {{--var mcount = Object.keys(result[i].media).length;--}}
                                        {{--for (var j = 0; j < mcount; j++) {--}}
                                            {{--if (j == 0) {--}}
                                                {{--$("#active_hotel_image").attr("src", result[i].media[j].filename);--}}
                                            {{--}--}}
                                            {{--else {--}}
                                                {{--$("#inactive_hotel_image").attr("src", result[i].media[j].filename);--}}
                                            {{--}--}}
                                        {{--}--}}

                                        {{--for (j = 0; j < result[i].stars; j++) {--}}
                                            {{--$("#hotel_star_image").attr("src", "{{ asset('images/star.png') }}");--}}
                                        {{--}--}}
                                        {{--document.getElementById("hotel_name").innerHTML = result[i].name;--}}
                                        {{--document.getElementById("hotel_address").innerHTML = result[i].address;--}}
                                        {{--$("#hotel_room_ref").attr("href", "/room?id=" + result[i].id);--}}
                                    {{--}--}}
                                {{--}--}}

                                {{--$("#curr_page").attr("href", "#");--}}
                                {{--$("#prev_page").remove();--}}
                                {{--$("#next_page").remove();--}}
                            {{--}--}}
                        {{--});--}}
                    {{--}--}}
                {{--});--}}

                {{--$("#stars").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */--}}
                    {{--var amenity = $("#amenities").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var start_price = $("#start_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var end_price = $("#end_price").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}
                    {{--var stars = $("#stars").val(); /* GET THE VALUE OF THE SELECTED DATA */--}}

                    {{--$.ajax({ /* THEN THE AJAX CALL */--}}
                        {{--type: "GET", /* TYPE OF METHOD TO USE TO PASS THE DATA */--}}
                        {{--url: "{{ action('HomeController@filterHotels') }}", /* PAGE WHERE WE WILL PASS THE DATA */--}}
                        {{--data: {--}}
                            {{--p: 1,--}}
                            {{--ajax: true,--}}
                            {{--amenity: amenity,--}}
                            {{--start_price: start_price,--}}
                            {{--end_price: end_price,--}}
                            {{--stars: stars--}}
                        {{--}, /* THE DATA WE WILL BE PASSING */--}}
                        {{--success: function(result){ /* GET THE TO BE RETURNED DATA */--}}
                            {{--console.log("Success "+result);--}}
                            {{--var count = Object.keys(result).length;--}}
                            {{--for(var i = 0 ; i < count ; i++){--}}
                                {{--if(count === i){--}}
                                    {{--break;--}}
                                {{--} else {--}}
                                    {{--var mcount = Object.keys(result[i].media).length;--}}
                                    {{--for (var j = 0; j < mcount; j++) {--}}
                                        {{--if (j == 0) {--}}
                                            {{--$("#active_hotel_image").attr("src", result[i].media[j].filename);--}}
                                        {{--}--}}
                                        {{--else {--}}
                                            {{--$("#inactive_hotel_image").attr("src", result[i].media[j].filename);--}}
                                        {{--}--}}
                                    {{--}--}}

                                    {{--for (j = 0; j < result[i].stars; j++) {--}}
                                        {{--$("#hotel_star_image").attr("src", "{{ asset('images/star.png') }}");--}}
                                    {{--}--}}
                                    {{--document.getElementById("hotel_name").innerHTML = result[i].name;--}}
                                    {{--document.getElementById("hotel_address").innerHTML = result[i].address;--}}
                                    {{--$("#hotel_room_ref").attr("href", "/room?id=" + result[i].id);--}}
                                {{--}--}}
                            {{--}--}}

                            {{--$("#curr_page").attr("href", "#");--}}
                            {{--$("#prev_page").remove();--}}
                            {{--$("#next_page").remove();--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}

            {{--});--}}
        {{--</script>--}}
    {{--@endsection--}}

@endsection
