<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Romms extends Model
{
    protected  $table   = 'romms';

    protected $fillable = ['name'];

    public function messages()
    {
        return $this->hasMany('App\Messages','room_id');
    }
}
