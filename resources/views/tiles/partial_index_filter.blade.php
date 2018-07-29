<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 6/5/17
 * Time: 6:43 AM
 */?>
<div class="carousel-caption hidden-xs">
    <img src="{{ asset('images/slider_icon.png') }}" class="slider-icon hidden-sm" alt="Fondoq">
    <div class="title hidden-sm">
        <p>اختار بين الاف الفنادق </p>
        <p>حول العالم</p>
    </div>
    <img src="{{ asset('images/line.png') }}" class="img-responsive hidden-sm center-block" alt="Fondoq">
    <!-- Form -->
    <form class="row" {{--action="{{ action('SearchController@getIndex') }}"--}} method="get">
        <div class="form-group col-lg-3 col-md-3 col-sm-6 pull-right text-right" id="localization">
            <label><span><img src="{{ asset('images/localization.png') }}" alt="Fondoq"></span> الوجهه</label>
            <p>
                <select name="cities_id" class="form-control">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">
                            @if(empty($city->country->name_ar)) {{ $city->country->name }} @else {{ $city->country->name_ar }} @endif
                            -
                                @if(empty($city->name_ar)) {{ $city->name }} @else {{ $city->name_ar }} @endif
                        </option>
                    @endforeach
                    <option value="1">القاهرة - مصر</option>
                    <option value="2">شرم الشيخ - مصر</option>
                    <option value="3">الغردقة - مصر</option>
                    <option value="4">الاقصر - مصر</option>
                    <option value="5">أسوان - مصر</option>
                </select>
            </p>
        </div>
        <div class="form-group col-lg-5 col-md-3 col-sm-6 pull-right text-right" id="destination">
            <label><span><img src="{{ asset('images/destination.png') }}" alt="Fondoq"></span> الوصول - المغادرة</label>
            <p class="row">
                <input name="arrivalDate" type="text" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"
                       data-date-format="dd/mm/yyyy"
                       class="datepicker arrival col-xs-5 pull-right">
                <span class="pull-right">-</span>
                <input name="departDate" type="text" value="{{ \Carbon\Carbon::now()->addDays(1)->format('d/m/Y') }}"
                       class="datepicker left col-xs-5 pull-right">
                <!--<input type="date" value="2017-08-26" class="arrival col-xs-5 pull-right">
                <span class="pull-right"> - </span>
                <input type="date" value="2017-08-30" class="left col-xs-5 pull-right">-->
            </p>
        </div>
        <div class="form-group col-lg-2 col-md-3 col-sm-6 pull-right" id="rooms">
            <label>عدد الغرف</label>
            <p>
                <input name="numOfRooms" type="text" class="label-default" value="1">
                <button type="button" class="btn btn-primary">+</button>
                <button type="button" class="btn btn-primary">-</button>
            </p>
        </div>
        <div class="form-group col-lg-2 col-md-3 col-sm-6 pull-right" id="persons">
            <label>عدد الأفراد</label>
            <p>
                <input name="numOfAdults" type="text" class="label-default" value="2">
                <button type="button" class="btn btn-primary">+</button>
                <button type="button" class="btn btn-primary">-</button>
            </p>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">اختر فندقك</button>
        </div>
    </form><!-- End Form -->
</div>
