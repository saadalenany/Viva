<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/07/18
 * Time: 05:40 م
 */
?>

<header id="navbar-top">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-right">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home"><img src="{{ asset('images/logo.png') }}"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/home">الرئيسية <span class="sr-only">(current)</span></a></li>
                    <li><a href="/about">من نحن</a></li>
                    <li><a href="/booking?p=1">حجز الفنادق</a></li>
                    <li><a href="#">الأسئلة الشائعة</a></li>
                    <li><a href="/contact">اتصل بنا</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header><!-- END HEADER -->
