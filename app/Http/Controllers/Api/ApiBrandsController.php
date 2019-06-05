<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brands;
use App\Http\Requests\ControllerBrands;
use App\Http\Requests\ControllerEditBrands;
use Illuminate\Support\Facades\Input;
use Image;

class ApiBrandsController extends Controller
{
   public function index()
   {
      $brands = Brands::orderBy("id","DESC")->paginate(5);
      return response()->json($brands);
   }


	public function show($id)
	{
	   $brands    =  Brands::find($id);
	   return response()->json($brands);
	}

    public function store(ControllerBrands $request)
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
    	$brands  =  Brands::create($request->all());
		return response()->json($brands);
    }



    public function update($id,ControllerEditBrands $request)
    {
        $brands =  Brands::find($id);

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

        $brands->update($request->all());
        return response()->json($brands);
    }


   public function destroy($id)
   {
      $brands =  Brands::find($id);
      $brands->delete();
      return response()->json('delete');
   }
}
