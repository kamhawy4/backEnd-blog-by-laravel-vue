<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    protected  $table   = 'tag_articles';

    protected $fillable = ['article_id','tag_id'];
}
