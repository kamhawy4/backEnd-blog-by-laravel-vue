<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
    	return view('admin.contact.index');
    }

    public function show($message_id)
    {
    	return view('admin.contact.show',compact('message_id'));
    }
}
