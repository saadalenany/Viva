<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 12:56 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content" id="blog">
        <!-- Blog Header -->
        <div class="blog-header">
            <h1 class="text-center">أنشطة ومقترحات</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End Blog Header -->

        <!-- Blog Vision -->
        <div class="vision">
            <div class="container">
                <p class="text-center center-block">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل
                    ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور
                    او فلاير على سبيل المثال ... او نماذج مواقع انترنت.
                </p>
            </div>
        </div><!-- End Blog Vision -->

        <!-- Blogs -->
        <div class="blogs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_1.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h1 class="text-center">سنوركلنج</h1>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                                <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم
                                    لتعرض العميل ليتصور طريقه وضع النصوص بالتصاميم
                                    سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل
                                    المثال ... او نماذج مواقع انترنت.
                                </p>
                                <div class="social">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><img src="{{ asset('images/facebook_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/twitter_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/google_plus_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/whats_app_icon_blog.png') }}"></a></li>
                                    </ul>
                                </div>
                                <p class="text-left">
                                    <a href="#" class="btn btn-default">فنادق قريبة</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_2.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <div class="caption caption-red">
                                <h1 class="text-center">تسلق الجبال</h1>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                                <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم
                                    لتعرض العميل ليتصور طريقه وضع النصوص بالتصاميم
                                    سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل
                                    المثال ... او نماذج مواقع انترنت.
                                </p>
                                <div class="social">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><img src="{{ asset('images/facebook_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/twitter_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/google_plus_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/whats_app_icon_blog.png') }}"></a></li>
                                    </ul>
                                </div>
                                <p class="text-left">
                                    <a href="#" class="btn btn-default">فنادق قريبة</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_3.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h1 class="text-center">الصيد</h1>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                                <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم
                                    لتعرض العميل ليتصور طريقه وضع النصوص بالتصاميم
                                    سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل
                                    المثال ... او نماذج مواقع انترنت.
                                </p>
                                <div class="social">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><img src="{{ asset('images/facebook_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/twitter_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/google_plus_icon_blog.png') }}"></a></li>
                                        <li><a href="#"><img src="{{ asset('images/whats_app_icon_blog.png') }}"></a></li>
                                    </ul>
                                </div>
                                <p class="text-left">
                                    <a href="#" class="btn btn-default">فنادق قريبة</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blogs -->

        <!-- More -->
        <div class="more">
            <div class="container">
                <div class="title">
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                    <h1 class="text-center">المزيد لتكتشفه</h1>
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                </div>
                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_6.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h2>التسلق على الجليد</h2>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_5.png') }}" class="img-responsive" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h2>القفز بالمظلة</h2>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                        <div class="thumbnail">
                            <div class="img">
                                <img src="{{ asset('images/blog_4.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h2>التزلج على الماء</h2>
                                <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End More -->

    </div><!-- END CONTENT -->

    @endsection