<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brands;
class ApiBrandsController extends Controller
{
   public function index()
   {
      $brands = Brands::orderBy("id","DESC")->paginate(5);
      return response()->json($brands);
   }


   public function destroy($id)
   {
      $brands =  Brands::find($id);
      $brands->delete();
      return response()->json('delete');
   }
}
