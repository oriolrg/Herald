@extends('layouts.app')

@section('content')


    <!-- *****************************************************************************************************************
     Ultims Articles
     ***************************************************************************************************************** -->



    <!-- *****************************************************************************************************************
     Seccions
     ***************************************************************************************************************** -->
    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">

                @foreach ($items as $key => $item)
                <div class="portfolio-item books">
                    <div class="he-wrap tpl6">

                        <div class="crop-img"  style="width: 100%; height: 250px;">
                            <div class="caption">
                                <h6 class="titol">{{ $item->title }}</h6>
                            </div>
                            <img style="width: 100%; height: 100%; margin:0 0 -133.3% 0;" src="/imageArticle/{{ $item->path }}" alt="">
                        </div>
                        <a href="articles/consulta/{{ $item->id }}">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">{{ $item->titleSeccio }}</h3>
                                    <!--<a data-rel="prettyPhoto" href="/img/portfolio/portfolio_10.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                    <a href="single-project.html" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                                    --><h4 class="a1" data-animate="fadeInDown"><span  id="#contingutDesccripcio">{{ $item->description }}</span></h4>
                                    <h7 class="a1" data-animate="fadeInDown">{{ $item->nom_usuari }}</h7>
                                </div><!-- he bg -->
                            </div><!-- he view -->
                        </a>
                    </div><!-- he wrap -->
                </div><!-- end col-12 -->
                @endforeach
            </div><!-- portfolio -->
        </div><!-- portfolio container -->
    </div><!--/Portfoliowrap -->


    <!-- *****************************************************************************************************************
     Ultims articles 1
     *****************************************************************************************************************
    @foreach ($items as $key => $item)
        <div id="twrap">
            <div class="container centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="titular">
                        <a href="http://localhost:8000/itemCRUD2/1">
                            <h4>{{ $item->title }}</h4>
                        </a>
                    </div>
                    <div class="foto_article">
                        <p>
                            <img class="foto_article" src="/imageArticle/{{ $item->path }}">
                            {{ $item->description }}
                        </p>
                    </div>

                    <p>{{ $item->titleSeccio }}</p>
                </div>
            </div>
        </div>
    @endforeach-->


    <!-- *****************************************************************************************************************
     Ultims articles 3
     ***************************************************************************************************************** -->
    <!--
    <div id="cwrap">
        <div class="container">
            <div class="row centered">
                <h3>OUR CLIENTS</h3>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <img src="/img/clients/client01.png" class="img-responsive">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <img src="/img/clients/client02.png" class="img-responsive">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <img src="/img/clients/client03.png" class="img-responsive">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <img src="/img/clients/client04.png" class="img-responsive">
                </div>
            </div>-->
    <!-- </div>
    </div>-->

@endsection