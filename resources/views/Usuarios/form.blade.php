	
<div class="form-group">
	<label for="Nombre" class="control-label">{{'Nombre'}}</label>
	<input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}} " name="Nombre" id="Nombre" 

	value=" {{ isset($usuario->Nombre)?$usuario->Nombre:old('Nombre') }} "
	>
	{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="ApellidoPaterno" class="control-label">{{'ApellidoPaterno'}}</label>
	<input type="text" class="form-control {{$errors->has('ApellidoPaterno')?'is-invalid':''}} " name="ApellidoPaterno" id="ApellidoPaterno" 

	value=" {{ isset($usuario->ApellidoPaterno)?$usuario->ApellidoPaterno:old('ApellidoPaterno') }} "
	>
	{!! $errors->first('ApellidoPaterno','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="ApellidoMaterno" class="control-label">{{'ApellidoMaterno'}}</label>
	<input type="text" class="form-control {{$errors->has('ApellidoMaterno')?'is-invalid':''}} " name="ApellidoMaterno" id="ApellidoMaterno" 

	value=" {{ isset($usuario->ApellidoMaterno)?$usuario->ApellidoMaterno:old('ApellidoMaterno') }} "
	>{!! $errors->first('ApellidoMaterno','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="Direccion" class="control-label">{{'Direccion'}}</label>
	<input type="text" class="form-control {{$errors->has('Direccion')?'is-invalid':''}} " name="Direccion" id="Direccion" 

	value=" {{ isset($usuario->Direccion)?$usuario->Direccion:old('Direccion') }} "
	>
	{!! $errors->first('Direccion','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="Telefono" class="control-label">{{'Telefono'}}</label>
	<input type="text" class="form-control {{$errors->has('Telefono')?'is-invalid':''}} " name="Telefono" id="Telefono" 

	value=" {{ isset($usuario->Telefono)?$usuario->Telefono:old('Telefono') }} "
	>
	{!! $errors->first('Telefono','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="NumeroTarjeta" class="control-label">{{'NumeroTarjeta'}}</label>
	<input type="text" class="form-control {{$errors->has('NumeroTarjeta')?'is-invalid':''}} " name="NumeroTarjeta" id="NumeroTarjeta" 

	value=" {{ isset($usuario->NumeroTarjeta)?$usuario->NumeroTarjeta:old('NumeroTarjeta') }} "
	>
	{!! $errors->first('NumeroTarjeta','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="Banco" class="control-label">{{'Banco'}}</label>
	<input type="text" class="form-control {{$errors->has('Banco')?'is-invalid':''}} " name="Banco" id="Banco" 

	value=" {{ isset($usuario->Banco)?$usuario->Banco:old('Banco') }} "
	>
	{!! $errors->first('Banco','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="Correo" class="control-label">{{'Correo'}}</label>
	<input type="email" class="form-control {{$errors->has('Correo')?'is-invalid':''}} " name="Correo" id="Correo" 

	value=" {{ isset($usuario->Correo)?$usuario->Correo:old('Correo') }} "
	>
	{!! $errors->first('Correo','<div class="invalid-feedback">:message</div>') !!}
</div>
	
<div class="form-group">
	<label for="Foto" class="control-label">{{'Foto'}}</label>
	@if(isset($usuario->Foto))
		
		<img src=" {{ asset('storage').'/'.$usuario->Foto}} " class="img-thumbnail img-fluid" width="100">
		
	@endif
	<input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto" id="Foto" value="{{ isset($usuario->Foto)?$usuario->Foto:old('Foto') }}">
	{!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
		
</div>
	
	<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}" name="">
	
	<a class="btn btn-primary" href="{{ url('usuarios') }}">Regresar</a>

