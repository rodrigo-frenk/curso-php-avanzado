@extends('layout/plantilla')

@section('content')


    <h1>Editar usuario</h1>

    {!! Form::model($user, array('method' => 'PATCH', 
    'route' =>array('users.update', $user->id))) !!}

        Nombre:
        {!! Form::text('name') !!}
        E-mail:
        {!! Form::email('email') !!}
        Contraseña:
        {!! Form::password('password') !!}

        {!! Form::submit() !!}

    {!! Form::close() !!}

@stop
