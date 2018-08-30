<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User,App\Article,App\Subscribe,App\Categories;

class ApiDashboardController extends Controller
{
  public function index()
  {
	$users          =  User::count();
	$article        =  Article::count();
	$subscribe      =  Subscribe::count();
	$categories     =  Categories::count();
	
    return response()->json([
    	                      'users'     => $users,
    	                      'article'   => $article,
    	                      'subscribe' => $subscribe,
    	                      'categories'=> $categories
    	                    ]);

  }

}
