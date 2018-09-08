<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthLogOutController extends Controller
{
    public function logout()
    {
    	$pusher = new \Pusher( env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID') );

        $pushessr =  $pusher::trigger('status-liked', 'StatusLiked', 'You have been logged out by  '.auth('api')->user()->name);

        return response()->json(['message' => 'Successfully logged out']);
    }
}
