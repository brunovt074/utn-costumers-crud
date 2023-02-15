@extends('layouts.app')

@section('titulo', 'Añadir Cliente')

@section('titulo-seccion')
<div class="container col-sm-12 col-md-6 pt-4 pb-5">
	<h3 class="container text-center">Ingrese los datos del nuevo cliente</h3>  
</div>  
@endsection

@section('contenido')
<form class="container col-lg-5 card pb-4 pt-3"action="{{ route('clientes.store') }}" method="POST">
  @csrf 
  <div class="form-group">
    <h5 class="text-center"><u>Datos Personales</u></h5>
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="apellido" value="{{ old('apellido') }}" maxlength="100">    
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" aria-describedby="nombre" maxlength="100">    
  </div>
  <div class="form-group">
    <label for="cuit">CUIT</label>
    <input type="text" class="form-control" name="cuit" id="cuit" value="{{ old('cuit') }}" aria-describedby="cuit">    
  </div>
  {{ provinciaPreset('null'); }}
  <hr>
  <h5 class="text-center"><u>Datos de Contacto</u></h5>
  <div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="tel" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}"  aria-describedby="telefono" maxlength="25">    
  </div>  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="email" maxlength="150">    
  </div>  
  <div class="container-fluid  col-sm-6  pt-3">
    <button type="submit" class="container btn btn-primary btn-block">Actualizar</button>  
  </div>  
</form>



@endsection()