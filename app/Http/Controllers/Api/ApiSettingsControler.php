<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use App\Http\Requests\ControllerSetting;


class ApiSettingsControler extends Controller
{

	public function GetData()
	{
		$settings =  Settings::first();
		return response()->json($settings);
	}

    public function update($id,ControllerSetting $request)
    {
    	$settings =  Settings::find($id);

		if($request->hasFile('avatar')) 
		{
			$logo       =   Input::file('avatar');
			$ext        =   $logo->getClientOriginalExtension();
			$path       =   public_path().'/uploads/logo';
			$fullename  =   time().'.'.$ext;
			$logo       ->  move($path,$fullename);
			$imagfav    =   Image::make($path.'/'.$fullename);
			$imagfav    ->  resize(291,104)->save();
			$request    ->  merge(['logo'=>$fullename]);

			$deleteImage = public_path().'/uploads/logo'.'/'.$settings->image;
			File::delete($deleteImage);
		}

		if($request->hasFile('favicone')) 
		{
			$fav           =   Input::file('favicone');
			$ext           =   $fav->getClientOriginalExtension();
			$path          =   public_path().'/uploads/fav';
			$fullenamefav  =   time().'.'.$ext;
			$fav           ->   move($path,$fullenamefav);
			$imagfav       =   Image::make($path.'/'.$fullenamefav);
			$imagfav       ->  resize(34,41)->save();
			$request       ->  merge(['fav'=>$fullenamefav]);

			$deleteImage = public_path().'/uploads/fav'.'/'.$settings->fav;
			File::delete($deleteImage);
		}

    	$settings->update($request->all());
		return response()->json($settings);
    }
}
