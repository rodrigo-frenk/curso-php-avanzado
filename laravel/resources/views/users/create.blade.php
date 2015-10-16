@extends('layout/plantilla')

@section('content')

<h1>Crear usuario</h1>

{!! Form::open(['url' => 'users']) !!}

    Nombre:
    {!! Form::text('name') !!}
    E-mail:
    {!! Form::email('email') !!}
    Contraseña:
    {!! Form::password('password') !!}

    {!! Form::submit() !!}

{!! Form::close() !!}

@stop
