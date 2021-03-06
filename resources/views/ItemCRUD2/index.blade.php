@extends('layouts.app')



@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Articles</h2>

            </div>

            <div class="pull-right">

                @permission('item-create')

                <a class="btn btn-success" href="{{ route('itemCRUD2.create') }}"> Create New Item</a>

                @endpermission

            </div>

        </div>

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>

            <th>Seccio</th>

            <th>Titol</th>

            <th>Descripció</th>

            <th>Article</th>

            <th>Autor</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($items as $key => $item)

            <tr>

                <td>{{ $item->titleSeccio }}</td>

                <td>{{ $item->title }}</td>

                <td><span  id="#contingutDesccripcio">{{ $item->description }}</span></td>

                <td><span  id="#contingutArticle">{{ $item->contingut }}</span></td>

                <td>{{ $item->nom_usuari }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('itemCRUD2.show',$item->id) }}">Vista prèvia</a>

                    @permission('item-edit')

                    <a class="btn btn-primary" href="{{ route('itemCRUD2.edit',$item->id) }}">Editar</a>

                    @endpermission

                    @permission('item-delete')

                    {!! Form::open(['method' => 'DELETE','route' => ['itemCRUD2.destroy', $item->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                    @endpermission

                </td>

            </tr>

        @endforeach

    </table>

    {!! $items->render() !!}

@endsection
