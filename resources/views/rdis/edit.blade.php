@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Responder RDI</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-outline-secondary mb-4" href="{{ route('rdis.index') }}"> Volver</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Hay problemas con sus entradas.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($rdi, ['method' => 'PATCH','route' => ['rdis.update', $rdi->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Remitente:</strong>
            {!! Form::text('name_sender', null, array('placeholder' => '','class' => 'form-control','readonly')) !!}
        </div>
    </div>

    {{-- el Form::text (bla bla) es para hacer un ID --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Destinatario:</strong>        
            {!! Form::text('name_recipient', null, array('placeholder' => '','class' => 'form-control', 'readonly')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Asunto:</strong>        
            {!! Form::text('subject', null, array('placeholder' => 'Requisito plano','class' => 'form-control','readonly')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Especialidad:</strong>        
            {!! Form::Text('specialization',null, array('class' => 'form-control','multiple','readonly')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contenido:</strong>
            {!! Form::text('content', null, array('placeholder' => '','class' => 'form-control','readonly')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Respuesta:</strong>
            {!! Form::textarea('respuesta', null, array('placeholder' => 'Ingrese su respuesta','class' => 'form-control','id'=>'editor')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado:</strong>
            {!! Form::text('status',null, array('class' => 'form-control',)) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-primary">Responder</button>
    </div>
</div>
{!! Form::close() !!}



<p class="text-center text-primary"><small>Sistema Comunicacional RDi</small></p>
@endsection