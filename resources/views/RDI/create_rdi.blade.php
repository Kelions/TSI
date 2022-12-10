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
    
    
    
    <form action="{{ route('proyects.store') }}" method="POST">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
        
            {{-- el Form::text (bla bla) es para hacer un ID --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido:</strong>        
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>RUT:</strong> <small>(Sin puntos y con digito verificador)</small>
                    <input type="text" name="name" class="form-control" placeholder="12345678-9">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tema RDI:</strong>
                    <input type="text" name="name" class="form-control" placeholder="...">
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
            <strong>Requerimiento de Informacion:<small></small></strong>

            <textarea class="form-control mb-5" name="" id="editor" cols="30" rows="10"></textarea>
            
        </div>
    </form>

    </div>
    
    
    
    <p class="text-center text-primary"><small>Sistema Comunicacional RDI</small></p>
    
 {{-- npm install --save @ckeditor/ckeditor5-build-classic --}}

@endsection