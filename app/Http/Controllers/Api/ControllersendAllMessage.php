<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use Mail;
use App\Http\Requests\ControllerSubscriber;

class ControllersendAllMessage extends Controller
{
    public function SendMessage(ControllerSubscriber  $request)
    {
      $setting  = Settings::first();
      $data     = $request->all();
      $mail     = Mail::send('emails.contact', $data, function($message) use ($request,$setting)
      {
        foreach($request->emails as $ems)
        {
           $message->from($setting->email,$setting->name_site);
           $message->to($ems);
           $message->subject($request->title);
        }           
      });
      return response()->json('Messages has been successfully Send');      
    }
}
