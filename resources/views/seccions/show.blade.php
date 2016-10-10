@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Mostrar Seccio</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('seccions.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nom:</strong>

                {{ $seccio->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripció:</strong>

                {{ $seccio->description }}

            </div>

        </div>

    </div>

@endsection