<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partners;
use App\Http\Requests\ControllerPartners;
use App\Http\Requests\ControllerEditPartners;
use Illuminate\Support\Facades\Input;
use Image;


class PartnersController extends Controller
{
    public function index()
   {
      $partners = Partners::orderBy("id","DESC")->paginate(5);
      return response()->json($partners);
   }


	public function show($id)
	{
	   $partners    =  Partners::find($id);
	   return response()->json($partners);
	}

    public function store(ControllerPartners $request)
    {
		if($request->hasFile('photo')) 
		{
			$logo       =   Input::file('photo');
			$ext        =   $logo->getClientOriginalExtension();
			$path       =   public_path().'/uploads/photo';
			$fullename  =   time().'.'.$ext;
			$logo       ->  move($path,$fullename);
			$imagfav    =   Image::make($path.'/'.$fullename);
			$request    ->  merge(['image'=>$fullename]);
		}
		
    	$partners  =  Partners::create($request->all());
		return response()->json($partners);
    }



    public function update($id,ControllerEditPartners $request)
    {
        $partners =  Partners::find($id);

        if($request->hasFile('photo')) 
        {
            $logo       =   Input::file('photo');
            $ext        =   $logo->getClientOriginalExtension();
            $path       =   public_path().'/uploads/photo';
            $fullename  =   time().'.'.$ext;
            $logo       ->  move($path,$fullename);
            $imagfav    =   Image::make($path.'/'.$fullename);
            $request    ->  merge(['image'=>$fullename]);
        }

        $partners->update($request->all());
        return response()->json($partners);
    }


   public function destroy($id)
   {
      $partners =  Partners::find($id);
      $partners->delete();
      return response()->json('delete');
   }
}
