<?php 

namespace App\Http\Controllers;

use App\User;

use Request;

use Hash;
use Redirect;

class UsersController extends Controller {

	


	public function index()
	{
		$users = User::all();
		return view('users.index')->with('users',$users);
	}

	public function create()
	{	
		return view('users.create');
	}
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store()
   {
   	$user=Request::all();
   	User::create($user);
   	return redirect('users');
   }
   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
   	$user = User::find( $id );
   	return view( 'users.show', compact('user') );
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
      //get the current user by id
   	$user = User::find($id);
   	if (is_null($user))
   	{
   		return Redirect::route('users.index');
   	}
        //redirect to update form
   	return view('users.edit', compact('user'));
   }
   /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

   public function update($id)
   {
	   //
   	$userUpdate=Request::all();
   	$user=User::find($id);
   	$user->update($userUpdate);
   	return redirect('users');
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
		User::find($id)->delete();
		return redirect('users');
   }



}

?>