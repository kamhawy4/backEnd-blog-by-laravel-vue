<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;
class SubscribeController extends Controller
{
   public function index()
   {
   	  $subscribe = Subscribe::orderBy("id","DESC")->paginate(5);
   	  return response()->json($subscribe);
   }

    public function destroy($id)
    {
      $subscribe = Subscribe::find($id);
      $subscribe->delete();
      return response()->json('delete');
    }

}
