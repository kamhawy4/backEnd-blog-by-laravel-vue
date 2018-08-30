<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected  $table   = 'settings';

    protected $fillable = ['name_site','email','logo','fav','brief_site','phone','addres','meta_keywords','meta_description'];
}
