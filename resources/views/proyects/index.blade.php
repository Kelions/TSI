@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Proyectos</h2>
            </div>
            <div class="pull-right">
                @can('proyecto-crear')
                <a class="btn btn-success mb-4" href="{{ route('proyects.create') }}"> Crear Nuevo proyecto</a>
                @endcan
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
            <th>Detalles</th>
            <th width="280px">Accion</th>
        </tr>
	    @foreach ($proyects as $proyect)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $proyect->name }}</td>
	        <td>{{ $proyect->detail }}</td>
	        <td>
                <form action="{{ route('proyects.destroy',$proyect->id) }}" method="POST">
                    <a class="btn btn-outline-secondary" href="{{ route('proyects.show',$proyect->id) }}">Ver</a>
                    @can('proyecto-editar')
                    <a class="btn btn-outline-primary" href="{{ route('proyects.edit',$proyect->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('proyecto-borrar')
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $proyects->links() !!}


<p class="text-center text-primary"><small>Sistema Comunicacion RDI</small></p>
@endsection