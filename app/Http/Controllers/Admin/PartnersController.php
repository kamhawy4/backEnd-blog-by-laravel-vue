<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    public function index()
    {
    	return view('admin.partners.index');
    }

    public function create()
    {
    	return view('admin.partners.create');
    }

    public function edit($partners_id)
    {
    	return view('admin.partners.edit',compact('partners_id'));
    }
}
