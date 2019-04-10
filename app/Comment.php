<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['thread_id','user', 'content'];
    public $timestamps = false;
    protected $table = 'comments';
}
