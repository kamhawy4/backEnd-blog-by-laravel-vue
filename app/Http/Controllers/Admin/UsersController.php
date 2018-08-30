<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
    	return view("admin.users.index");
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function edit($user_id)
    {
    	return view('admin.users.edit',compact('user_id'));
    }
}
