@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Mostrar Article</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('itemCRUD2.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h2>

                    {{ $item->title }}

                </h2>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>

                    {{ $item->description }}

                </strong>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                {{ $item->contingut }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <img src="public/{{ $item->path }}">

            </div>

        </div>

    </div>

@endsection