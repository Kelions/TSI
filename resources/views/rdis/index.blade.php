@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion de RDIs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-4" href="{{ route('rdis.create') }}"> Crear Nuevo RDI</a>
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
   <th>Remitente</th>
   <th>Destinatario</th>
   <th>Asunto</th>
   <th>Especialidad</th>
   <th>estado</th>
   <th width="175">Action</th>
 </tr>
 @foreach ($data as $key => $rdi)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $rdi->name_sender }}</td>
    <td>{{ $rdi->name_recipient }}</td>
    <td>{{ $rdi->subject }}</td>
    <td>{{ $rdi->specialization }}</td>
    <td>{{ $rdi->status }}</td>
    <td>
       <a class="btn btn-outline-secondary" href="{{ route('rdis.show',$rdi->id) }}">Ver</a>
       <a class="btn btn-outline-primary" href="{{ route('rdis.edit',$rdi->id) }}">Responder</a>
    </td>
  </tr>
 @endforeach
</table>

{{-- <table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Remitente</th>
    <th>Destinatario</th>
    <th>Asunto</th>
    <th>Especialidad</th>
    <th>estado</th>
    <th width="150">Action</th>
  </tr>
  @foreach ($data as $key => $rdi)
   <tr>
     <td>{{ ++$i }}</td>
     <td>{{ $rdi->name_sender }}</td>
     <td>{{ $rdi->name_recipient }}</td>
     <td>{{ $rdi->subject }}</td>
     <td>{{ $rdi->specialization }}</td>
     <td>{{ $rdi->status }}</td>
     <td>
        <a class="btn btn-outline-secondary" href="{{ route('rdis.show',$rdi->id) }}">Ver</a>
        <a class="btn btn-outline-primary" href="{{ route('rdis.edit',$rdi->id) }}">Editar</a>
     </td>
   </tr>
  @endforeach
 </table> --}}


{!! $data->render() !!}


<p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>
@endsection