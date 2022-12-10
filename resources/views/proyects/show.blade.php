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
    <div class="mb-5 text-center mt-5">
        <h2>RDI´s del Proyecto</h2>
        
    </div>
    <table class="table table-bordered">
        <tr>
            <th width="10">Nro</th>
            <th>Estado</th>
            <th width="150">Remitente</th>
            <th width="">TEMA</th>
            <th width="300" class="text-center" width="">Accion</th>
        </tr>
        <td>1</td>
        <td>Pendiente</td>
        <td>juanito perez</td>
        <td>bla bla</td>
        <td class="text-center">
            <button  type="button" class="btn btn-primary">Responder</button>
            <button type="button" class="btn btn-secondary">Ver</button>
        </td>
    </table>

    <p class="text-center text-primary mt-5">
      
          <a href="{{ route('rdis.create') }}"><button type="button" class="btn btn-info mt-5">Crear RDI</button></a> 
        
            
      
        

    </p>
    



    <p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>
@endsection
