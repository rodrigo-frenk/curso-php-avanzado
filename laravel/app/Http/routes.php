<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//namespace App\Httºp;
//use Eloquent;
//use User;

use App\User;

Route::get('/', function () {

	$hora = date('h:i:s A, d F, Y.', time() );

	$datos = array(
		'hora' => $hora,
		'nombre' => 'Un nombre'
	);
    

    return view('welcome')->with( $datos );
    // return view('welcome')->with( 'hora', $hora );

});


Route::resource( 'users' , 'UsersController' );

