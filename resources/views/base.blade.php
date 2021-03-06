
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>الفندق</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- JQuery styles -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Pgwslider style -->
    <link href="{{asset('css/pgwslider.min.css')}}" rel="stylesheet">
    <!-- Custom style -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body>

<!-- HEADER -->
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

@yield('body')

<!-- FOOTER -->
<footer>
    <div class="footer-top">
        <div class="container">
            <nav class="bottom-menu text-center">
                <a href="/home">الرئيسية</a>
                <a href="/about">من نحن</a>
                <a href="#">الأسئلة الشائعة</a>
                <a href="/contact">اتصل بنا</a>
            </nav>
            <nav class="social text-center">
                <a href="#"><img src="{{ asset('images/facebook-icon.png')}}" alt="Fondoq"></a>
                <a href="#"><img src="{{ asset('images/twitter-icon.png') }}" alt="Fondoq"></a>
                <a href="#"><img src="{{ asset('images/google-plus-icon.png') }}" alt="Fondoq"></a>
                <a href="#"><img src="{{ asset('images/instagram-icon.png') }}" alt="Fondoq"></a>
            </nav>
        </div>
    </div>
    <img src="{{ asset('images/footer.png') }}" class="img-responsive" alt="Fondoq">
    <div class="footer-bottom">
        <p class="text-center">جميع الحقوق محفوظة©</p>
    </div>
</footer>
<!-- END FOOTER -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- PGWslider -->
<script src="{{asset('js/pgwslider.min.js')}}"></script>
<!-- Custom Script -->
<script src="{{asset('js/script.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    $( function() {
        $( ".datepicker" ).datepicker();
    } );
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--@yield("hotelsearch")--}}

</body>
</html>
