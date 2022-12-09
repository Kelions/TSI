@extends('layouts.app')
@section('content')


        
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Generar RDI</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-secondary mb-4" href="{{ route('proyects.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    
    
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> hay problemas con las entradas.<br><br>
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif
    
    
    
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre_destinatario', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    
        {{-- el Form::text (bla bla) es para hacer un ID --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>        
                {!! Form::text('apellido_destinatario', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rut:<small> (sin puntos y con digito verificador)</small></strong>
                {!! Form::text('rut_destinatario', null, array('placeholder' => '12345678-9','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Tema RDI:<small> (Consta de 45 caracteres)</small></strong>
                {!! Form::text('tema_rdi', null, array('placeholder' => '...','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
            <strong>Requerimiento de Informacion:<small></small></strong>

            {!! Form::text('contenido_rdi', null, array('class' => 'form-control mb-5', 'id' => 'editor')) !!}

            
        </div>
    

    </div>
    {!! Form::close() !!}
    
    
    <p class="text-center text-primary"><small>Sistema Comunicacional RDI</small></p>


@endsection