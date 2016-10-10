@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Create New Item</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('itemCRUD2.index') }}"> Tornar</a>

            </div>

        </div>

    </div>

    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> Hi ha algun problema amb les dades introduides.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {!! Form::open(array('route' => 'itemCRUD2.store','method'=>'POST', 'files' => true)) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Titol de l'article:</strong>

                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripció max 140 caracters:</strong> <span id="caracters"></span>

                {!! Form::textarea('description', null, array('id' => 'description', 'placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Contingut de l'article:</strong></strong>

                {!! Form::textarea('contingut', null, array('placeholder' => 'Contingut','class' => 'form-control','style'=>'height:100px')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Escull una imatge maxim 2Mb:</strong>

                {!! Form::file('path') !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Escull la secció a la que pertany l'article:</strong>

                {!! Form::select('seccio_id', $seccions, array('placeholder' => 'seccio_id','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection