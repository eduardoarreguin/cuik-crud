@extends('layouts.app')

@section('content') 

<div class="container">

@if(count($errors)>0)

	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)   

				<li>
					{{ $error }}
				</li>

			@endforeach
		</ul>
	</div>
@endif
	Seccion para crear usuarios
	<form action="{{url('/usuarios')}}" class="form-vertical" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		@include('usuarios.form',['Modo'=>'crear'])

		
	</form>
</div>
@endsection