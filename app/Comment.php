<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable = ['thread_id','user', 'content'];
    public $timestamps = false;
    protected $table = 'comments';


    public function getUser(){
        $user = DB::table('users')->where([
            ['email','=', $this->user]
        ])->first();
        return $user->name;
    }
}

