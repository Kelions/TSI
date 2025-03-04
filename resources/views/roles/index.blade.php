@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Roles</h2>
        </div>
        <div class="pull-right">
        @can('rol-crear')
            <a class="btn btn-success mb-4" href="{{ route('roles.create') }}"> Crear Nuevo Rol</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@else
  @if ($message = Session::get('danger'))
  <div class="alert alert-danger">
    <p>{{ $message }}</p>
  </div>
  @endif
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nombre</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-outline-secondary" href="{{ route('roles.show',$role->id) }}">Ver</a>
            @can('rol-editar')
                <a class="btn btn-outline-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
            @endcan
            @can('rol-borrar')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}


<p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>
@endsection