@extends('layouts.app')

@section('titulo', 'Lista de Clientes')

@section('titulo-seccion')
<div class="container col-md-6 col-lg-3 text-center pt-4 pb-5">
	<h3><strong>Lista de Clientes</strong></h3>	
</div>  
@endsection

@section('contenido')

	<div class='container table-responsive col-sm-12 col-lg-9 pl-2'>
		<table class="table table-striped pt-4 mb-5 pb-5 pl-2 ml-2">
	  	<thead>
		    <tr>
		      <th scope="col-sm-12 col-lg-2">Número de Cliente</th>
		      <th scope="col-sm-12 col-lg-4">Apellido</th>
		      <th scope="col-sm-12 col-lg-4">Nombre</th>
		      <th scope="col-sm-12 col-lg-2"></th>
		    </tr>
	  	</thead>
      	<tbody>
      		@foreach($clientes as $cliente)
		    <tr class="ml-2 pl-2" scope="row">
	      		<td class="">{{ $cliente-> nro_cliente }}</td>
			    <td>{{ $cliente -> apellido }}</td>
			    <td>{{ $cliente -> nombre }}</td>		      
			    <td class="d-flex hstack gap-2">
			    	<a role="button" class="container btn btn-primary col-md-5" href="{{ route('clientes.show', $cliente) }}">Ver</a>	      			      	
			      	<button type="button" class="container btn btn-secondary col-md-5" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cliente-> nro_cliente }}">Eliminar</button>
			      	
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
		  	    </td>
		    </tr>
		    @endforeach		    
	 	</tbody>
   	</table>		
	</div>
@endsection


<!---->