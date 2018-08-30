<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	return view('admin.articles.index');
    }

    public function create()
    {
    	return view('admin.articles.create');
    }

    public function edit($article_id)
    {
    	return view('admin.articles.edit',compact('article_id'));
    }
    
}
