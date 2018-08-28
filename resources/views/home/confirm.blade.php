<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/07/18
 * Time: 09:46 م
 */
?>

@extends('base')

@section('body')


    <!-- CONTENT -->
    <div class="content hotels2 hotels3 hotels4" id="hotel">
        <!-- About Header -->
        <div class="hotel-header">
            <h1 class="text-center">تأكيد الحجز</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- Search -->
        <div class="search">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h1 class="text-default text-left">فاتورة</h1>
                        <div class="row">
                            <div class="col-md-5 col-sm-6 pull-right">
                                <div class="desc">
                                    <h5>إصدار فاتورة الى</h5>
                                    <h5 class="text-danger">{{$creditCardUser->inputName}}</h5>
                                    <h6 class="text-default">{{$hot->address}}</h6>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-6 pull-right">
                                <div class="invoice-details text-center bg-default">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 pull-right">
                                            <h5>رقم الفاتورة</h5>
                                            <span>{{$responseData['response_code']}}</span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 pull-right">
                                            <h5>تاريخ الفاتورة</h5>
                                            <span>{{date('Y-m-d')}}</span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 pull-right">
                                            <h5>رقم الحساب</h5>
                                            <span>{{$creditCardUser->inputCardNumber}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-right">التفاصيل</th>
                                            <th class="text-center">الكمية</th>
                                            <th class="text-center">السعر</th>
                                            <th class="text-center">الإجمالي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0 ; $i<count($room_checked) ; $i++)
                                            <tr>
                                                <th class="text-right">{{$hot->name}} - {{$room_checked[$i]->name}}</th>
                                                <th class="text-center">1</th>
                                                <th class="text-center">{{$room_checked[$i]->price_per_night}} جنيه</th>
                                                <th class="text-center">{{$room_checked[$i]->price_per_night}} جنيه<hr></th>
                                            </tr>
                                        @endfor
                                        <tr>
                                            <th class="text-right"></th>
                                            <th class="text-center"></th>
                                            <th class="text-center" colspan="2">
                                                <p><label>السعر</label> : <span>{{$total}} جنيه</span></p>
                                                <p><label>الضريبة</label> : <span>{{$tax}} جنيه</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-right"></th>
                                            <th class="text-center bg-danger" colspan="3">
                                                <p><label>الإجمالي</label> : <span>{{$total+$tax}} جنيه</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-right pay" colspan="3">
                                                <h6>طريقة الدفع</h6>
                                                <img src="{{ asset('images/visa_card.png') }}">
                                                <span class="text-danger">نشكركم على ثقتكم بنا !</span>
                                            </th>
                                            <th class="text-center signature">
                                                <p>TauhidHasan</p>
                                                <h5>Tauhid Hasan</h5>
                                                <h4>Project manager</h4>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pdf">
                    <p class="text-left"><a href="#" class="text-default">تحميل pdf</a></p>
                </div>

                <!-- Confirm Booking -->
                <div class="panel panel-primary message">
                    <div class="panel-heading">
                        <img src="{{ asset('images/info-icon.png') }}" alt="fondoq">
                        <span>تأكيد الحجز</span>
                    </div>
                    <div class="panel-body">
                        <h4>عميلنا العزيز</h4>
                        <h4>تم تأكيد الحجز الخاص بك و شكرا لإختيارك الفندق</h4>
                        <h4>سيتم إرسال إيميل بتفاصيل حجزك</h4>
                        <h4>للدعم أو المساعدة 002028713284</h4>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="submit-btn text-left">
                    <a href="#" class="btn btn-default">إغلاق</a>
                </div>
            </div>
        </div><!-- End Search -->

    </div><!-- END CONTENT -->

    @endsection
