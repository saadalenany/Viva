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
                        <h5>فندق فور سيزونز نايل بلازا</h5>
                        <div class="five-stars">
                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                            <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                        </div>
                        <p>كورنيش النيل شارع مجلس الشعب الجيزة القاهرة </p>
                        <hr>
                        <!-- pgwslider -->
                        <ul class="pgwSlider">
                            <li><img src="{{ asset('images/hotels1_sec2_3.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_1.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_2.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_3.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_4.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_5.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_6.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_7.jpg') }}"></li>
                            <li><img src="{{ asset('images/hotels2_8.jpg') }}"></li>
                        </ul>
                    </div>
                </div>

                <!-- About Hotel -->
                <div class="panel panel-primary" id="about-hotel">
                    <div class="panel-body">
                        <h5 class="text-primary"><img src="{{ asset('images/hotel-icon.png') }}">عن الفندق</h5>
                        <p>في قلب القاهرة وعلي بعد 40 دقيقة من مطار القاهرة الدولي يقع فندق كونراد القاهرة بإطلالة متميزة علي نهر النيل ويجاور أماكن الجذب السياحي في القاهرة بما في ذلك الأهرامات
                            وتمثال أبو الهول وأحياء القاهرة التجاري يوفر كونراد مجموعة من الغرف المختلفة المطلة علي النيل بالاضافة لغرف و اجنحة رجال الأعمال التي تتيح مزايا إضافية مثل الجراج المجاني
                            و إمكانية الدخول إلى الاستراحة التنفيذية كما يمكن للضيوف الاستمتاع بخدمة واي فاي مجاناً في جميع الغرف والمناطق العامة وغرف الاجتماعات.
                        </p>
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
                                <div class="col-sm-12">
                                    <input type="checkbox" id="room-check">
                                    <label for="room-check"><span></span>غرفة كلاسيك مزدوجة أو توأمية <small>إقامة بدون إفطار</small></label>
                                    <ul class="list">
                                        <li><span>41 م²</span></li>
                                        <li><span>حوض استحمام</span></li>
                                        <li><span>حمام خاص</span></li>
                                        <li><span>واي فاي مجانا</span></li>
                                        <li><span>شرفة</span></li>
                                        <li><span>إطلالة على النهر</span></li>
                                        <li><span>تلفزيون بشاشة مسطحة</span></li>
                                        <li><span>صندوق أمانات</span></li>
                                        <li><span>تكييف  </span></li>
                                    </ul>
                                    <h6 class="text-danger">رسوم الإلغاء</h6>
                                    <ul class="list">
                                        <li><span>إلغاء مجاني قبل تاريخ 08/01/2017</span></li>
                                        <li><span>928 من تاريخ وما بعده 08/01/2017</span></li>
                                        <li><span>7٫424 من تاريخ وما بعده 10/01/2017</span></li>
                                    </ul>
                                    <h1 class="text-danger">7٫424 جنيه</h1>
                                </div>
                                <div class="col-sm-12">
                                    <input type="checkbox" id="room-check2">
                                    <label for="room-check2"><span></span>غرفة كلاسيك مزدوجة أو توأمية <small>إقامة بدون إفطار</small></label>
                                    <ul class="list">
                                        <li><span>41 م²</span></li>
                                        <li><span>حوض استحمام</span></li>
                                        <li><span>حمام خاص</span></li>
                                        <li><span>واي فاي مجانا</span></li>
                                        <li><span>شرفة</span></li>
                                        <li><span>إطلالة على النهر</span></li>
                                        <li><span>تلفزيون بشاشة مسطحة</span></li>
                                        <li><span>صندوق أمانات</span></li>
                                        <li><span>تكييف  </span></li>
                                    </ul>
                                    <h6 class="text-danger">رسوم الإلغاء</h6>
                                    <ul class="list">
                                        <li><span>إلغاء مجاني قبل تاريخ 08/01/2017</span></li>
                                        <li><span>928 من تاريخ وما بعده 08/01/2017</span></li>
                                        <li><span>7٫424 من تاريخ وما بعده 10/01/2017</span></li>
                                    </ul>
                                    <h1 class="text-danger">7٫424 جنيه</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="submit-btn text-left">
                    <a href="/payment" class="btn btn-primary">متابعة</a>
                </div>
            </div>
        </div><!-- End Search -->

    </div><!-- END CONTENT -->

    @endsection
