<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
class SettingsController extends Controller
{
    public function index()
    {
    	return view('admin.settings.index');
    }
}
