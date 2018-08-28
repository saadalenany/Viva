<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 12:30 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content hotels2 hotels3" id="hotel">
        <!-- About Header -->
        <div class="hotel-header">
            <h1 class="text-center">الدفع</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- Search -->
        <div class="search">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h5 class="text-primary"><img src="{{ asset('images/hotel-icon.png') }}">عن الفندق</h5>
                        <div class="row">
                            <div class="col-md-8 col-sm-6 pull-right">
                                <div class="desc">
                                    <h5>{{$hot->name}}</h5>
                                    <div class="five-stars">
                                        @for($j=0 ; $j < $hot->stars ; $j++)
                                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                                        @endfor
                                    </div>
                                    <div class="clearfix"></div>
                                    <h5>{{$hot->address}}</h5>
                                    <p><img src="{{ asset('images/check_out.png') }}"><span>تاريخ الوصول</span> - <span>{{$hot->created_at}}</span></p>
                                    <p><img src="{{ asset('images/check_in.png') }}"><span>تاريخ المغادرة</span> - <span>{{$hot->updated_at}}</span></p>
                                    @foreach($room_checked as $room)
                                        <p><img src="{{ asset('images/profile-icon.png') }}"><span>{{$room->name}}</span></p>
                                    @endforeach
                                    <h1 class="text-danger">{{$total}}</h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 pull-right">
                                <img src="{{ asset('images/hotels1_sec2_3.jpg') }}" class="img-responsive" alt="Fondoq">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <form class="form-horizontal" action="/confirm" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <img src="{{ asset('images/info-icon.png') }}" alt="fondoq">
                            <span>معلوماتك</span>
                        </div>
                        <input type="hidden" value="{{$total}}" name="total"/>
                        <input type="hidden" name="id" value="{{$hot->id}}"/>
                        <input type="hidden" name="room_checked" value="{{json_encode($room_checked)}}"/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 pull-right control-label">الإسم بالكامل</label>
                                <div class="col-sm-4 pull-right">
                                    <input type="text" class="form-control" id="inputName" name="inputName" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMobile" class="col-sm-2 pull-right control-label">الجوال</label>
                                <div class="col-sm-4 pull-right">
                                    <input type="tel" class="form-control" id="inputMobile" name="inputMobile" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 pull-right control-label">البريد الإلكتروني</label>
                                <div class="col-sm-4 pull-right">
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" required/>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="inputComments" class="col-sm-2 pull-right control-label">طلبات خاصة</label>
                                <div class="col-sm-10 pull-right">
                                    <textarea class="form-control" id="inputComments" name="inputComments" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Credit -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <img src="{{ asset('images/visa.png') }}" alt="fondoq">
                            <span>تفاصيل البطاقة</span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 pull-right control-label">الإسم   كما يظهر على البطاقة</label>
                                <div class="col-sm-4 pull-right">
                                    <input type="text" class="form-control" id="inputName" name="inputCardName" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNumber" class="col-sm-2 pull-right control-label">رقم البطاقة</label>
                                <div class="col-sm-4 pull-right">
                                    <input type="number" class="form-control" id="inputNumber" name="inputCardNumber" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMonth inputYear" class="col-sm-2 pull-right control-label">تاريخ الإنتهاء</label>
                                <div class="col-sm-2 pull-right">
                                    <input type="number" class="form-control text-center" id="inputMonth" name="inputCardMonth" placeholder="الشهر" required>
                                </div>
                                <div class="col-sm-2 pull-right">
                                    <input type="number" class="form-control text-center" id="inputYear" name="inputCardYear" placeholder="السنة" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSecure" class="col-sm-2 pull-right control-label">رمز الحماية الثلاثي الموجود خلف البطاقة</label>
                                <div class="col-sm-2 pull-right">
                                    <input type="number" class="form-control" id="inputSecure" name="inputCardSecure" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="submit-btn text-left">
                        <p class="pull-right text-right">بإكمالي هذا الجزء فإني أقر بإطلاعي وموافقتي على <a href="#" class="text-danger">سياسة الخصوصية</a> المطبقة على هذا الحجز</p>
                        <button type="submit" class="btn btn-danger">متابعة</button>
                    </div>
                </form>

            </div>
        </div><!-- End Search -->

    </div><!-- END CONTENT -->

@endsection
