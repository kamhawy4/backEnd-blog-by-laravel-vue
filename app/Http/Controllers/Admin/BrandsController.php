<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brands;

class BrandsController extends Controller
{
  	public function index()
    {
    	return view('admin.brands.index');
    }

    public function create()
    {
    	return view('admin.brands.create');
    }

    public function edit($brands_id)
    {
    	return view('admin.brands.edit',compact('brands_id'));
    }
}
