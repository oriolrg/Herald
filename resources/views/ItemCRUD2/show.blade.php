@extends('layouts.app')



@section('content')
<div @role(('admin') || ('escriptor'))     @if($user->name === Auth::user()->name)     contentEditable="true" spellcheck="true" @endif @endrole>
    <div class="row" xmlns="http://www.w3.org/1999/html">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">



            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ URL::previous() }}"> Back</a>

            </div>

        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <h2>{{ $item->title }}</h2>
            <summary><strong><span  id="#contingutDesccripcio">{{ $item->description }}</span></strong></summary>

        </div>

    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
<!--TODO fer que l'usuari propietari pugui editar-->
            <div class="form-group">
                <p><img style="width: 50%; height: 40%; margin:0 0 0 0;" src="/imageArticle/{{ $item->path }}" alt="" align="top">
                <span  id="#contingutArticle">{{ $item->contingut }}</span></p>
            </div>

        </div>
    </div>
</div>
<strong>Secció:</strong> {{ $seccio->title }} || <strong>Usuari:</strong> {{ $user->name }}
@endsection
