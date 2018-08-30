<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
class ApiContactUsController extends Controller
{
    public function index()
    {
    	$data =  ContactUs::orderBy("id","DESC")->paginate(5);
    	return response()->json($data);
    }

    public function destroy($id)
    {
      $contactUs = ContactUs::find($id);
      $contactUs->delete();
      return response()->json('delete');
    }

    public function show($id)
    {
      $data = ContactUs::find($id);
      return response()->json($data);
    }
}
