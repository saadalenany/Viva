<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 6/5/17
 * Time: 6:41 AM
 */
        ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{ asset('images/home_slider_1.png') }}" alt="Fondoq">
        </div>
        <div class="item">
            <img src="{{ asset('images/home_slider_2.png') }}" alt="Fondoq">
        </div>
        <div class="item">
            <img src="{{ asset('images/home_slider_3.png') }}" alt="Fondoq">
        </div>
        <div class="item">
            <img src="{{ asset('images/home_slider_4.png') }}" alt="Fondoq">
        </div>
        <div class="item">
            <img src="{{ asset('images/home_slider_5.png') }}" alt="Fondoq">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>