<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\ControllerUsers;
use App\Http\Requests\ControllerEditUsers;
use Auth;

class ApiUsersControler extends Controller
{
   public function store(ControllerUsers $request)
   {
     $request   ->  merge(['password' => bcrypt($request->password)]); 
   	 $user      =   User::create($request->all());
   	 return response()->json($user);
   }

   public function index()
   {
   	 $user =  User::orderBy("id","DESC")->paginate(5);
   	 return response()->json($user);	
   }

   public function destroy($id)
   {
   	 $user =  User::find($id);
   	 $user->delete();
   	 return response()->json('user deleted');
   }

   public function show($id)
   {
   	 $user =  User::find($id);
   	 return response()->json($user);
   }

   public function update($id,ControllerEditUsers $request)
   {
   	 	$update    =  User::findOrFail($id); 
	    if($request->has('password')) {
    	$request->merge(['password' => bcrypt($request->password)]);
	    }else {
    	  $request->merge(['password' => $update->password]);
        }
		$update->update($request->all());
   	    return response()->json($update);
   }
}
