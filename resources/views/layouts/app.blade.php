<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>- Herald - Vall de Lord</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('js/script.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Herald la Vall de Lord</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">INICI</a></li>
                <!--<li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">SECCIONS <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Seccio::all('title') as $key =>$seccio)
                            <li><a href="{{ $seccio->title}}.html">{{ $seccio->title}}</a></li>
                        @endforeach

                    </ul>
                </li>
                @role('admin')
                <li><a href="{{ route('users.index') }}">EDITAR USUARIS</a></li>
                <li><a href="{{ route('roles.index') }}">EDITAR ROLS USUARI</a></li>
                <li><a href="{{ route('seccions.index') }}">EDITAR SECCIONS</a></li>
                @endrole
                @role(('admin') || ('escriptor'))
                <li><a href="{{ route('itemCRUD2.index') }}">EDITAR ARTICLES</a></li>
                @endrole
                @role(('admin') || ('escriptor'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>SORTIR</a></li>
                        </ul>

                @endrole

                </li>
                <!-- Authentication Links -->

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Entrar</a></li>
                    <li><a href="{{ url('/register') }}">Registrar-se</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
<!--<div class="container">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
            @foreach(\App\Seccio::all('title') as $key =>$seccio)
    <li><a href="{{ $seccio->title}}.html">{{ $seccio->title}}</a></li>
            @endforeach

        </ul>
    </div>
    </div>-->
</div>
<div class="contingut">
    @yield('content')



    <!-- *****************************************************************************************************************
     FOOTER
     ***************************************************************************************************************** -->
    <div id="footerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Sobre Herald</h4>
                    <div class="hline-w"></div>
                    <p>Publicació de notícies i opinió de la Vall de Lord mantinguda per una comunitat d'usuaris oberta. Es demana als usuaris, la realització d'articles respectuosos, objectius i constructius.</p>
                </div>
                <div class="col-lg-4">
                    <h4>Social Links Vall de Lord</h4>
                    <div class="hline-w"></div>
                    <p>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <h4>Plataforma</h4>
                    <div class="hline-w"></div>
                    <p><h2>VallLord.cat</h2></p>
                </div>

            </div><! --/row -->
        </div><! --/container -->
    </div><! --/footerwrap -->
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/retina-1.1.0.js')}}"></script>
<script src="{{asset('js/jquery.hoverdir.js')}}"></script>
<script src="{{asset('js/jquery.hoverex.min.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>



<script>
    (function($) {
        "use strict";
        var $container = $('.portfolio'),
                $items = $container.find('.portfolio-item'),
                portfolioLayout = 'fitRows';

        if( $container.hasClass('portfolio-centered') ) {
            portfolioLayout = 'masonry';
        }

        $container.isotope({
            filter: '*',
            animationEngine: 'best-available',
            layoutMode: portfolioLayout,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            },
            masonry: {
            }
        }, refreshWaypoints());

        function refreshWaypoints() {
            setTimeout(function() {
            }, 1000);
        }

        $('nav.portfolio-filter ul a').on('click', function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector }, refreshWaypoints());
            $('nav.portfolio-filter ul a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        function getColumnNumber() {
            var winWidth = $(window).width(),
                    columnNumber = 1;

            if (winWidth > 1200) {
                columnNumber = 5;
            } else if (winWidth > 950) {
                columnNumber = 4;
            } else if (winWidth > 600) {
                columnNumber = 3;
            } else if (winWidth > 400) {
                columnNumber = 2;
            } else if (winWidth > 250) {
                columnNumber = 1;
            }
            return columnNumber;
        }

        function setColumns() {
            var winWidth = $(window).width(),
                    columnNumber = getColumnNumber(),
                    itemWidth = Math.floor(winWidth / columnNumber);

            $container.find('.portfolio-item').each(function() {
                $(this).css( {
                    width : itemWidth + 'px'
                });
            });
        }

        function setPortfolio() {
            setColumns();
            $container.isotope('reLayout');
        }

        $container.imagesLoaded(function () {
            setPortfolio();
        });

        $(window).on('resize', function () {
            setPortfolio();
        });
    })(jQuery);

</script>
</body>
</html>