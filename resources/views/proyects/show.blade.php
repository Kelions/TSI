@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar Proyecto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('proyects.index') }}"> Atras</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $proyect->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                {{ $proyect->detail }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>