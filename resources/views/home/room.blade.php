<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 12:43 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content hotels2" id="hotel">
        <!-- About Header -->
        <div class="hotel-header">
            <h1 class="text-center">اختيار الغرفة</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- Search -->
        <div class="search">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="{{ asset('images/question_mark.png') }}" alt="fondoq">
                        <span>تفاصيل الفندق</span>
                    </div>
                    <div class="panel-body">
                        <h5>{{$hot[0]->name}}</h5>
                        <div class="five-stars">
                            @for($j=0 ; $j < $hot[0]->stars ; $j++)
                                <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                            @endfor
                        </div>
                        <p>{{$hot[0]->address}}</p>
                        <hr>
                        <!-- pgwslider -->
                        <ul class="pgwSlider">
                            @for($j=0 ; $j < count($medias) ; $j++)
                                <li><img src="{{$medias[$j]->filename}}"></li>
                            @endfor
                        </ul>
                    </div>
                </div>

                <!-- About Hotel -->
                <div class="panel panel-primary" id="about-hotel">
                    <div class="panel-body">
                        <h5 class="text-primary"><img src="{{ asset('images/hotel-icon.png') }}">عن الفندق</h5>
                        <p>{{$hot[0]->descr}}</p>
                        <hr>
                        <nav class="desc-icons text-center">
                            <a href="#"><img src="{{ asset('images/wifi-icon.png') }}"><h5 class="text-primary">واي فاي</h5></a>
                            <a href="#"><img src="{{ asset('images/room-service-icon.png') }}"><h5 class="text-primary">خدمة الغرف</h5></a>
                            <a href="#"><img src="{{ asset('images/res-location-icon.png') }}"><h5 class="text-primary">موقع ملائم</h5></a>
                            <a href="#"><img src="{{ asset('images/near-airport-icon.png') }}"><h5 class="text-primary">قريب للمطار</h5></a>
                            <a href="#"><img src="{{ asset('images/parking-icon.png') }}"><h5 class="text-primary">مواقف سيارات</h5></a>
                            <a href="#"><img src="{{ asset('images/family-room-icon.png') }}"><h5 class="text-primary">غرف عائلية</h5></a>
                            <a href="#"><img src="{{ asset('images/gym-icon.png') }}"><h5 class="text-primary">مركز لياقة بدنية</h5></a>
                        </nav>
                        <div class="desc">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 pull-right">
                                    <ul class="list">
                                        <li><span>صالة مشتركة / منطقة تلفزيون</span></li>
                                        <li><span>خدمة نقل من وإلى المطار - تكلفة إضافية</span></li>
                                        <li><span>مكيفات</span></li>
                                        <li><span>غرفة خالية من مسببات الحساسية</span></li>
                                        <li><span>محلات تجارية في الموقع</span></li>
                                        <li><span>خدمة إيقاظ</span></li>
                                        <li><span>تدفئة</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 pull-right">
                                    <ul class="list">
                                        <li><span>استئجار سيارات</span></li>
                                        <li><span>تتوفر غرف متصلة</span></li>
                                        <li><span>أرض مغطاة بالسجاد</span></li>
                                        <li><span>محلات هدايا</span></li>
                                        <li><span>صندوق الأمانات</span></li>
                                        <li><span>مصعد</span></li>
                                        <li><span>مرافق غرف كبار الشخصيات</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 pull-right">
                                    <ul class="list">
                                        <li><span>غرف عائلية</span></li>
                                        <li><span>صالون حلاقة / تجميل</span></li>
                                        <li><span>مرافق لذوي الاحتياجات الخاصة</span></li>
                                        <li><span>مرافق كي الملابس</span></li>
                                        <li><span>خدمة نقل المطار</span></li>
                                        <li><span>غرف لغير المدخنين</span></li>
                                        <li><span>مكواة</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="rooms">
                            <h5 class="text-primary"><img src="{{ asset('images/room.png') }}">اختار نوع غرفتك</h5>
                            <div class="row">
                                @foreach($hot[0]->rooms_details as $room)
                                    <div class="col-sm-12">
                                        <input type="checkbox" id="room-check">
                                        <label for="room-check"><span> {{$room->descr}} </span><small>إقامة بدون إفطار</small></label>
                                        <ul class="list">
                                            @foreach($room->room_amenities as $amn)
                                                <li><span>{{$amn->name}}</span></li>
                                            @endforeach
                                        </ul>
                                        <h6 class="text-danger">رسوم الإلغاء</h6>
                                        <ul class="list">
                                            <li><span>إلغاء مجاني قبل تاريخ 08/01/2017</span></li>
                                            <li><span>928 من تاريخ وما بعده 08/01/2017</span></li>
                                            <li><span>7٫424 من تاريخ وما بعده 10/01/2017</span></li>
                                        </ul>
                                        <h1 class="text-danger">{{$room->price_per_night}}</h1>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="submit-btn text-left">
                    <a href="/payment?p={{$hot[0]->id}}" class="btn btn-primary">متابعة</a>
                </div>
            </div>
        </div><!-- End Search -->

    </div><!-- END CONTENT -->

    @endsection
