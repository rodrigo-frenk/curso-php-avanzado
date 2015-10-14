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

	$hora = date('h:i:s A, d F, Y.', time());

	$datos = array(
		'hora' => $hora
	);
    

    return view('welcome')->with( 'hora', $hora );

});


Route::controller('users','UsersController');

Route::get('/crear_usuario', function () {

    return view('crearusuario');

});

Route::post('/crear_usuario', array('as'=>'crear_usuario','uses'=>'UsersController@crear_usuario'));
// 	$user = new User();
// 	$user->name = 'Tester Test';
// 	$user->email = 't1234est@test.com';
// 	$user->password = '12354test';



// 	$user->save();


// 	$users = User::all();

//     return view('usuarios')->with( 'users', $users );

// });




Route::get('/ver_usuarios', function () {

	$users = User::all();

    return view('usuarios')->with( 'users', $users );

	//return "Se ha creado exitosamente el usuario";

});



