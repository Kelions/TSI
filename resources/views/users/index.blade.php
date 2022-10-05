@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion de Usuarios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-4" href="{{ route('users.create') }}"> Crear Nuevo Usuario</a>
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
   <th>Nombre</th>
   <th>Apellido</th>
   <th>Rut</th>
   <th>Especialidad</th>
   <th>Email</th>
   <th>Fono cel.</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->nombre_usuario }}</td>
    <td>{{ $user->apellido_usuario }}</td>
    <td>{{ $user->rut }}</td>
    <td>{{ $user->especialidad }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->cel }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-outline-secondary" href="{{ route('users.show',$user->id) }}">Mostrar</a>
       <a class="btn btn-outline-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Borrar', ['class' => 'btn btn-outline-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>
@endsection