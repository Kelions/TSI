@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle Proyecto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-secondary mb-5 mt-3" href="{{ route('proyects.index') }}"> Volver</a>
            </div>
        </div>
    </div>



    <div class="row">

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $proyect->id }}
            </div>
        </div>

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