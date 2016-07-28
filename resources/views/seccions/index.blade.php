@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Seccions</h2>

            </div>

            <div class="pull-right">

                @permission('role-create')

                <a class="btn btn-success" href="{{ route('seccions.create') }}"> Crear nova Secció</a>

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

            <th>No</th>

            <th>Name</th>

            <th>Description</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($seccions as $key => $seccio)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $seccio->title }}</td>

                <td>{{ $seccio->description }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('seccions.show',$seccio->id) }}">Show</a>

                    @permission('role-edit')

                    <a class="btn btn-primary" href="{{ route('seccions.edit',$seccio->id) }}">Edit</a>

                    @endpermission

                    @permission('role-delete')

                    {!! Form::open(['method' => 'DELETE','route' => ['seccions.destroy', $seccio->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                    @endpermission

                </td>

            </tr>

        @endforeach

    </table>

    <!--{//!! $seccio->render() !!} -->

@endsection