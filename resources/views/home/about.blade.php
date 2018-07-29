<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 12:50 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content" id="about">
        <!-- About Header -->
        <div class="about-header">
            <h1 class="text-center">من نحن</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
            <h3 class="text-center">نمكنك من الاستمتاع بتجربة رائعة لحجز الفنادق حول العالم</h3>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- About Vision -->
        <div class="vision">
            <div class="container">
                <h1 class="text-center">الرؤية</h1>
                <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                <p class="text-center">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل
                    ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور
                    او فلاير على سبيل المثال ... او نماذج مواقع انترنت ... وعند موافقه
                    العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع
                    النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية
                    بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.
                </p>
            </div>
        </div><!-- End About Vision -->

        <!-- About Message -->
        <div class="message">
            <div class="container">
                <h1 class="text-center">الرؤية</h1>
                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                <p class="text-center">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل
                    ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور
                    او فلاير على سبيل المثال ... او نماذج مواقع انترنت ... وعند موافقه
                    العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع
                    النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية
                    بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.
                </p>
            </div>
        </div><!-- End About Message -->

        <!-- About Services -->
        <div class="services">
            <div class="container">
                <div class="title text-center">
                    <h1>خدماتنا</h1>
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/about_sec3_1.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h3 class="text-center">أنشطة و مقترحات</h3>
                                <img src="{{ asset('images/title.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <p class="text-center">
                                <a href="/blog" class="btn btn-primary" role="button">المزيد</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/about_sec3_2.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h3 class="text-center">أفضل الفنادق فى اوروبا</h3>
                                <img src="{{ asset('images/title.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <p class="text-center">
                                <a href="#" class="btn btn-primary" role="button">المزيد</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/about_sec3_3.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h3 class="text-center">الأحداث السنوية</h3>
                                <img src="{{ asset('images/title.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <p class="text-center">
                                <a href="#" class="btn btn-primary" role="button">المزيد</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- END CONTENT -->

    @endsection

