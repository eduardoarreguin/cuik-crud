@extends('layouts.app')

@section('content') 

<div class="container">

	@if(Session::has('Mensaje'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('Mensaje') }}
		</div>
	
	@endif

	<a href="{{ url('usuarios/create') }}" class="btn btn-success">Agregar Usuario</a>
		<br>
		<br>
	<table class="table table-light table-hover">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Acciones</th>
			</tr>
			
		</thead>

		<tbody>
			@foreach($usuarios as $usuario)	
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>

						<img src=" {{ asset('storage').'/'.$usuario->Foto}} " class="img-thumbnail img-fluid" width="100" height="100">

						
					</td>	
					<td> {{ $usuario->Nombre}} {{ $usuario->ApellidoPaterno}} {{ $usuario->ApellidoMaterno}}</td>
					<td> {{ $usuario->Direccion}} </td>
					<td> {{ $usuario->Telefono}} </td>
					<td> {{ $usuario->Correo}} </td>
					<td> 

						<a class="btn btn-warning" href="{{ url('/usuarios/'.$usuario->id.'/edit') }}">
							Editar
						</a>

					 
						<form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" style="display:inline">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger" type="submit" onclick="return confirm('Seguro que quieres borrar la informacion');">Eliminar</button>
						</form>
					</td>
					
				</tr>
			@endforeach
		</tbody>
		
	</table>

	{{  $usuarios->links()  }}

</div>
@endsection


 <!--  $table->increments('id');
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->string('NumeroTarjeta');
            $table->string('Banco');
            $table->string('Correo');
            $table->string('Foto');
            $table->timestamps(); -->