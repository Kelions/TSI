@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detalle del rdi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-outline-secondary mb-4" href="{{ route('rdis.index') }}"> Volver</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id RDI:</strong>
            {{ $rdi->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id del proyecto:</strong>
            {{ $rdi->id_proyect}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Remitente:</strong>
            {{ $rdi->name_sender}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Destinatario:</strong>
            {{ $rdi->name_recipient}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Asunto:</strong>
            {{ $rdi->subject }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Especialidad:</strong>
            {{ $rdi->specialization}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contenido:</strong>
            {{ $rdi->content}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Respuesta:</strong>
            {{ $rdi->respuesta}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado:</strong>
            {{ $rdi->status}}
        </div>
    </div>
    
</div>

@endsection