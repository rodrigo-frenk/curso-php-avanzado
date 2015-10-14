<?php 

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

use Hash;
use Redirect;

class UsersController extends Controller {

	public function getIndex() {
		$users = User::all();
		return view('usuarios')->with('users',$users);
	}

	public function crear_usuario(Request $request) {


	    $user = new User;
	    $user->name = $request->input('name');
	    $user->email = $request->input('email');
	    // $user->password = $request->input('password');
	    $user->password = Hash::make( $request->input('password') );
	    $user->save();


	  return Redirect::action('UsersController@getIndex');


	}

}

?>