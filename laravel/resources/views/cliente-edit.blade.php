@extends('layouts.app')

@section('titulo', 'Actualizar Cliente')

@section('titulo-seccion')
<div class="container col-sm-12 col-md-6 pt-4 pb-5">
	<h3 class="container text-center">Actualizacion de Datos del Cliente</h3>
  <h3 class="text-center container pt-2 mb-0"><strong>{{ $cliente->nombre }} {{ $cliente->apellido }} </strong></h3>
</div>  
@endsection

@section('contenido')
<form class="container card shadow-sm col-lg-5  pb-4 pl-5 pr-5  ml-5 mr-5"action="{{ route('clientes.update', $cliente) }}" method="POST">
  @csrf @method('PATCH')
  <div class="form-group row">      
      <label class="col-sm-6 col-form-label pb-2" for="id" >Número de Cliente: {{ old('nro_cliente',$cliente -> nro_cliente) }}</label>    
    <hr>
  </div>
  <h5 class="text-center"><u>Datos Personales</u></h5>
  <div class="form-group pt-2 pb-2">
    <label class="pb-2" for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="apellido" value="{{ old('apellido', $cliente -> apellido) }}" maxlength="100">    
  </div>
  <div class="form-group pt-2 pb-2">
    <label class="pb-2" for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $cliente -> nombre) }}" aria-describedby="nombre" maxlength="100">    
  </div>
  <div class="form-group pt-2 pb-2">
    <label class="pb-2" for="cuit">CUIT</label>
    <input type="text" class="form-control" name="cuit" id="cuit" value="{{ old('cuit', $cliente -> cuit) }}" aria-describedby="cuit" minlength="11" maxlength="11">    
  </div>
  {{ provinciaPreset($cliente->provincia) }}
  <div class="form-group pt-2 pb-2">
    <hr>
    <h5 class="text-center"><u>Datos de Contacto</u></h5>
    <label class="pb-2" for="telefono">Teléfono</label>
    <input type="tel" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $cliente -> telefono) }}"  aria-describedby="telefono" maxlength="25">    
  </div>  
  <div class="form-group pt-2 pb-2">
    <label class="pb-2" for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $cliente -> email) }}" aria-describedby="email" maxlength="150">    
  </div>
  <hr>  
  <div class="container-fluid d-flex vstack gap-1">
    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
      @csrf
      @method('PATCH')
      <button type="submit" class="container col-6 btn btn-primary mt-3 mb-4" >Actualizar</button>
      <button type="button" class="container col-6 btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cliente-> nro_cliente }}">Eliminar</button>
    </form>
    <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $cliente->nro_cliente }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</form>
@endsection