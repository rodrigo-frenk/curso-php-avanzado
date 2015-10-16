@extends('layout/plantilla')

@section('content')

    <div class="row">
        Nombre: {{ $user['name'] }}   
    </div>
   
    <div class="row">
       E-mail: {{ $user['email'] }}
    </div>
    
    <div class="row">
       Password: {{ $user['password'] }}
    </div>


@stop
