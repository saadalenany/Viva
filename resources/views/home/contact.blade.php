<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/07/18
 * Time: 09:49 م
 */
?>

@extends('base')

@section('body')


    <!-- CONTENT -->
    <div class="content" id="contact">
        <!-- Contact Header -->
        <div class="contact-header">
            <div class="title">
                <h1 class="text-center">اتصل بنا</h1>
                <img src="{{ asset('images/line-black.png') }}" class="img-responsive center-block hidden-xs" alt="Fondoq">
            </div>
            <div class="caption" dir="ltr">
                <img src="{{ asset('images/phone.png') }}" class="img-responsive center-block" alt="Fondoq">
                <h4 class="text-center">+20 15786 21547</h4>
                <img src="{{ asset('images/email.png') }}" class="img-responsive center-block" alt="Fondoq">
                <h4 class="text-center"><a href="mailto: fondoq@hotmail.com">fondoq@hotmail.com</a></h4>
            </div>
        </div><!-- End Contact Header -->

        <!-- Social Icons -->
        <nav class="social text-center">
            <a href="#"><img src="{{ asset('images/facebook-icon.png') }}" alt="Fondoq"></a>
            <a href="#"><img src="{{ asset('images/twitter-icon.png') }}" alt="Fondoq"></a>
            <a href="#"><img src="{{ asset('images/google-plus-icon.png') }}" alt="Fondoq"></a>
            <a href="#"><img src="{{ asset('images/instagram-icon.png') }}" alt="Fondoq"></a>
        </nav><!-- End Social Iocns -->

        <!-- Contact Form -->
        <div class="contact-form">
            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="name" class="sr-only">الاسم</label>
                        <input type="text" class="form-control" id="name" placeholder="الاسم">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="sr-only">رقم التواصل</label>
                        <input type="tel" class="form-control" id="phone" placeholder="رقم التواصل">
                    </div>
                    <div class="form-group">
                        <label for="subject" class="sr-only">نص الرسالة</label>
                        <input type="text" class="form-control" id="subject" placeholder="نص الرسالة">
                    </div>
                    <div class="form-group">
                        <label for="message" class="sr-only">نص الرسالة</label>
                        <textarea class="form-control" id="message" placeholder=" " rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">إرسال</button>
                </form>
            </div>
        </div>

    </div><!-- END CONTENT -->

    @endsection
