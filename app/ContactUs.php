<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected  $table   = 'contact_uses';

    protected $fillable = ['name','email','phone','subject','message','type'];
}
