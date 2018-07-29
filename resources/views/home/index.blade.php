<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/07/18
 * Time: 05:18 م
 */
?>

@extends('base')

@section('body')
    <!-- CONTENT -->
    <div class="content">

        <!-- Slideshow -->
    @include('tiles.partial_slider')
    <!-- End Slideshow -->

        <!-- Fixed Filter Banner -->
    @include('tiles.partial_index_filter')
    <!-- End Filter -->

        <!-- Best Offers -->
        <div id="best-offers">
            <div class="container">
                <div class="title text-center">
                    <h1>أفضل العروض</h1>
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive" alt="Fondoq">
                </div>
                <div class="row" id="sec2">

                    @foreach($offers as $offer)
                        <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                            <div class="thumbnail">
                                <div class="img">
                                    @if(!empty($offer->hotel->media[0]) && $offer->hotel->media[0]->path=='EXTERNAL')
                                        <img src="{{ asset('images/home_sec2_1.png') }}" alt="Fondoq">
                                    @else
                                        <img src="{{url('images', ['hotels', $offer->hotel->media[0]->filename])}}" onerror="imgError(this)" alt="Unloaded Image..."/>
                                    @endif
                                </div>
                                <div class="caption">
                                    <h3 class="text-center">{{ $offer->name_ar }}</h3>
                                    <img src="{{ asset('images/title.png') }}" class="img-responsive" alt="Fondoq">
                                </div>
                                <div class="offer">
                                    <img src="{{ asset('images/less_price.png') }}" alt="Fondoq">
                                </div>
                                <div class="price">
                                    <h1 class="text-center">{{ $offer->offer_price }}</h1>
                                </div>
                                <p class="text-center">
                                    <a {{--href="{{ action('SearchController@getIndex') }}"--}} class="btn btn-primary" role="button">احجز الان</a>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div><!-- End Best Offers -->

        <!-- Activities -->
        <div id="activities">
            <div class="container">
                <div class="title text-center">
                    <h1>أنشطة و مقترحات</h1>
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                </div>
                <div class="row" id="sec3">
                    <div class="col-sm-4 col-xs-12 pull-right">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="thumbnail">
                                    <div class="img">
                                        <img src="{{ asset('images/home_sec3_3.png') }}" alt="Fondoq">
                                    </div>
                                    <div class="caption">
                                        <h2>تسلق الجبال</h2>
                                        <p>تسلق الجبال ترتبط رياضة تسلق الجبال والشغف بارتقاء المرتفعات بحب المغامرة والمخاطرة وعشق الطبيعة. </p>
                                        <p class="text-center">
                                            <a href="#" class="btn btn-primary" role="button">احجز الان</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="thumbnail">
                                    <div class="img">
                                        <img src="{{ asset('images/home_sec3_1.png') }}" alt="Fondoq">
                                    </div>
                                    <div class="caption">
                                        <h2>تسلق الجبال</h2>
                                        <p>تسلق الجبال ترتبط رياضة تسلق الجبال والشغف بارتقاء المرتفعات بحب المغامرة والمخاطرة وعشق الطبيعة. </p>
                                        <p class="text-center">
                                            <a href="#" class="btn btn-primary" role="button">احجز الان</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-xs-12 pull-right">
                        <div class="thumbnail">
                            <div class="img img-center">
                                <img src="{{ asset('images/home_sec3_mid.png') }}" alt="Fondoq">
                            </div>
                            <div class="caption">
                                <h2>تسلق الجبال</h2>
                                <p>تسلق الجبال ترتبط رياضة تسلق الجبال والشغف بارتقاء المرتفعات بحب المغامرة والمخاطرة وعشق الطبيعة. وهي تحتاج إلى لياقة بدنية مرتفعة وقوة احتمال فائقة ومعرفة بتسلق الجبال واستخدام الأدوات المساعدة اللازمة. </p>
                                <p class="text-center">
                                    <a href="#" class="btn btn-primary" role="button">احجز الان</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-xs-12 pull-right">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="thumbnail">
                                    <div class="img">
                                        <img src="{{ asset('images/home_sec3_1.png') }}" alt="Fondoq">
                                    </div>
                                    <div class="caption">
                                        <h2>تسلق الجبال</h2>
                                        <p>تسلق الجبال ترتبط رياضة تسلق الجبال والشغف بارتقاء المرتفعات بحب المغامرة والمخاطرة وعشق الطبيعة. </p>
                                        <p class="text-center">
                                            <a href="#" class="btn btn-primary" role="button">احجز الان</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="thumbnail">
                                    <div class="img">
                                        <img src="{{ asset('images/home_sec3_2.png') }}" alt="Fondoq">
                                    </div>
                                    <div class="caption">
                                        <h2>تسلق الجبال</h2>
                                        <p>تسلق الجبال ترتبط رياضة تسلق الجبال والشغف بارتقاء المرتفعات بحب المغامرة والمخاطرة وعشق الطبيعة. </p>
                                        <p class="text-center">
                                            <a href="#" class="btn btn-primary" role="button">احجز الان</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Activities -->

        <!-- Events -->
        <div id="events">
            <div class="container">
                <div class="title text-center">
                    <h1>الأحداث السنوية و المهرجانات</h1>
                    <img src="{{ asset('images/title_line.png') }}" class="img-responsive center-block" alt="Fondoq">
                </div>
                <!-- Event Slider -->
                <div id="carousel-example-2-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{ asset('images/home_sec4.png') }}" alt="Fondoq">
                            <div class="carousel-caption">
                                <img src="{{ asset('images/line.png') }}" class="slider-icon hidden-sm hidden-xs" alt="Fondoq">
                                <div class="title">
                                    <h1 class="text-center">احتفال رأس السنة</h1>
                                    <img src="{{ asset('images/line.png') }}" class="slider-icon hidden-sm hidden-xs" alt="Fondoq">
                                    <h2 class="text-center">6 ديسمبر  - 13 ديسمبر</h2>
                                    <h3 class="text-center">الإمارات - دبي</h3>
                                    <p class="text-center">
                                        <a href="#" class="btn btn-primary" role="button">فنادق دبي</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/home_sec4_1.png') }}" alt="Fondoq">
                            <div class="carousel-caption">
                                <img src="{{ asset('images/line.png') }}" class="slider-icon hidden-sm hidden-xs" alt="Fondoq">
                                <div class="title">
                                    <h1 class="text-center">احتفال رأس السنة</h1>
                                    <img src="{{ asset('images/line.png') }}" class="slider-icon hidden-sm hidden-xs" alt="Fondoq">
                                    <h2 class="text-center">6 ديسمبر  - 13 ديسمبر</h2>
                                    <h3 class="text-center">الإمارات - دبي</h3>
                                    <p class="text-center">
                                        <a href="#" class="btn btn-primary" role="button">فنادق دبي</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-2-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-2-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- Event Slider -->
        </div><!-- End Events -->

    </div><!-- END CONTENT -->


    @endsection