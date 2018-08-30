<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;

class ApiCategorysController extends Controller
{
   public function index()
   {
     $categories = Categories::orderBy("id","DESC")->paginate(5);
     return response()->json($categories);
   }

   public function store(Request $request)
   {
   	$this->validate($request,[
	   'name'  =>'required|unique:categories|max:255',
	  ]);

   	$request->merge(['slug'=>$this->make_slug($request->name)]);
   	$categories = Categories::create($request->all());
    return response()->json($categories);
   }

   public function destroy($id)
   {
   	 $categories =  Categories::find($id);
   	 $categories->delete();
     return response()->json($categories);
   }

   public function update($id,Request $request)
   {
      $this->validate($request,[
        'name'  =>'required|max:255',
      ]);

       $categories = Categories::find($id);
       $request->merge(['slug'=>$this->make_slug($request->name)]);
       $categories->update($request->all());
       return response()->json($categories);  
   }
}
