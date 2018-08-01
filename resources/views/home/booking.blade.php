<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/07/18
 * Time: 01:46 ص
 */
?>

@extends('base')

@section('body')

    <!-- CONTENT -->
    <div class="content" id="hotel">
        <!-- About Header -->
        <div class="hotel-header">
            <h1 class="text-center">اختيار الفندق</h1>
            <img src="{{ asset('images/line.png') }}" class="img-responsive center-block" alt="Fondoq">
        </div><!-- End About Header -->

        <!-- Search -->
        <div class="search">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <img src="{{ asset('images/location-icon.png') }}">
                            <span>القاهرة - مصر</span>
                        </div>
                        <div class="pull-left">
                            <nav class="arrange">
                                <a href="#" class="active"><img src="{{ asset('images/blocks-icon.png') }}"></a>
                                <a href="#"><img src="{{ asset('images/rows-icon.png') }}"></a>
                                <a href="#"><img src="{{ asset('images/location-arr-icon.png') }}"></a>
                            </nav>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="result">
                            <div class="text-center">
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>تاريخ الوصول</label><br>
                                    <span>24-12-2016</span>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>تاريخ المغادرة</label><br>
                                    <span>29-12-2016</span>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>عدد الغرف</label><br>
                                    <span>1</span>
                                    <span>+</span>
                                </div>
                                <div class="col-md-3 col-sm-6 pull-right">
                                    <label>عدد الأفراد</label><br>
                                    <span>-</span>
                                    <span>2</span>
                                    <span>+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="col-md-3 col-sm-6 pull-right">
                                <select>
                                    <option>وسائل الراحة</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 pull-right">
                                <select>
                                    <option>نوع الغرفة</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 pull-right">
                                <select>
                                    <option>السعر</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 pull-right">
                                <select>
                                    <option>عدد النجوم</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-right">
                            <div class="alert alert-muted pull-right">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('images/close-icon.png') }}"></span>
                                </button>
                                <span>3 نجوم</span>
                            </div>
                            <div class="alert alert-muted pull-right">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('images/close-icon.png') }}"></span>
                                </button>
                                <span>سويت</span>
                            </div>
                            <div class="alert alert-muted pull-right">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('images/close-icon.png') }}"></span>
                                </button>
                                <span>حمام سباحة</span>
                            </div>
                            <div class="alert alert-muted pull-right">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('images/close-icon.png') }}"></span>
                                </button>
                                <span>جراج</span>
                            </div>
                            <div class="alert alert-muted pull-right">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('images/close-icon.png') }}"></span>
                                </button>
                                <span>جيم و سبا</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Search -->

        <!-- Result -->
        <div class="search-result">
            <div class="container">
                <div class="row">

                    @for($i = (($num-1)*10) ; $i < (($num-1)*10)+10 ; $i++)
                        @if(count($hotels) == $i)
                            @break
                        @else
                            <div class="col-md-4 col-sm-6 pull-right">
                                <div class="thumbnail">
                                    <div id="carousel-example-generic-1" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            @for($j=0 ; $j < count($hotels[$i]->media) ; $j++)
                                                @if($j == 0)
                                                    <div class="item active">
                                                        <img src="{{$hotels[$i]->media[$j]->filename}}" onerror="imgError(this)" alt="Unloaded Image..."/>
                                                    </div>
                                                @else
                                                    <div class="item">
                                                        <img src="{{$hotels[$i]->media[$j]->filename}}" onerror="imgError(this)" alt="Unloaded Image..."/>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic-1" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic-1" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <div class="five-stars">
                                            @for($j=0 ; $j < $hotels[$i]->stars ; $j++)
                                                <img src="{{ asset('images/star.png') }}" alt="Fondoq">
                                            @endfor
                                        </div>
                                        <h5>{{$hotels[$i]->name}}</h5>
                                        <p>{{$hotels[$i]->address}}</p>
                                        <p><a href="/room?id={{$hotels[$i]->id}}" class="btn btn-primary pull-left" role="button">احجز الان</a> <span class="pull-right">{{$hotels[$i]->max_price}}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor

                </div>
            </div>
        </div><!-- End Result -->

        <!-- Pagination -->
        <div class="pagination">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <span class="page">الصفحة {{$num}} من {{ ceil(count($hotels)/10) }}</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <nav class="page-navigation">
                            @for($i = 1 ; $i <= ceil(count($hotels)/10) ; $i++)
                                @if($i == $num)
                                    <a href="/booking?p={{$num}}" class="active">{{$num}}</a>
                                @else
                                    <a href="/booking?p={{$i}}">{{$i}}</a>
                                @endif
                            @endfor
                        </nav>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                        <span class="page">10 من {{count($hotels)}} فندق</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pagination -->

    </div><!-- END CONTENT -->

    @endsection

