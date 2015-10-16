@extends('layout/plantilla')

@section('content')


	@foreach( $users as $user )

	   <li>{{$user['id']}}:
	    <div>Nombre: {{ $user['name'] }}</div>
	    <div>E-mail: {{ $user['email'] }}</div>
	    <div>Password: {{ $user['password'] }}</div>
	   </li> 

		{!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}

	@endforeach



@stop