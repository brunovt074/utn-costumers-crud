@extends('layouts.app')


@section('titulo', 'Perfil del Cliente')

@section('titulo-seccion')
<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
<div class="container col-sm-12 col-md-6 col-lg-3 pt-4 pb-2 text-center">
	<h3>Perfil del Cliente</h3>	
</div>  
@endsection


@section('contenido')
<div class="card container col-lg-5" style="width: 23rem;">
	<div class="card-header text-center"><strong><h5 class="card-title">{{$cliente -> apellido }} {{$cliente -> nombre }}</strong></h5></div>	
  <img src="//localhost/dashboard/daw2022/tp/tp-parte-2/public/imgs/profile-default.png" class="card-img-top" alt="foto-cliente">
  <div class="card-body">
    
    	<p class="card-text"><strong>Número de Cliente:</strong> {{$cliente -> nro_cliente}}</p>
		<p class="card-text"><strong>CUIT:</strong> {{$cliente -> cuit}}</p>
	    <p class="card-text"><strong>Teléfono:</strong> {{$cliente -> telefono}}</p>
	    <p class="card-text"><strong>E-mail:</strong> {{$cliente -> email}}</p>
	    <p class="card-text"><strong>Provincia:</strong> {{$cliente -> provincia}}</p>

	    <hr>
	    <!--Botones-->
	    <div class="d-flex row container-fluid hstack gap-2">
	    	<a class="btn btn-primary mt-3" href="{{ route('clientes.edit', $cliente) }}" type="button">Actualizar</a>
	    	<button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cliente-> nro_cliente }}">Eliminar</button>
	    	<!-- Modal -->
			<div class="modal fade" id="deleteModal{{ $cliente-> nro_cliente }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro Número: {{ $cliente->nro_cliente }}</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	Se borrará el cliente: {{ $cliente->nombreCompleto() }}<br/>
			        La siguiente acción no se podrá deshacer... ¿Desea continuar?
			      </div>
			      <div class="modal-footer">
			        <form class="" action="{{ route('clientes.destroy', $cliente) }}" method="POST">
			  		@csrf
			  		@method('DELETE')
			  			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			  			<button class="btn btn-primary" type="submit">Eliminar</button>
			  		</form>
			      </div>
			    </div>
			  </div>
			</div>	    	
	    </div>	    	
  </div>
</div>
@endsection


