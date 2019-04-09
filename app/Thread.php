<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thread extends Model
{
    //
    protected $table = 'threads';

    public function getUser(){
        $user = DB::table('users')->where([
            ['email','=', $this->user]
        ])->first();
        return $user->name;
    }

    public function getPaddedContent(){
      $threadContent = DB::table('threads')->where([
            ['id', '=', $this->id]
      ])->first();
      $conThread = substr($threadContent->content, 0, 100);
      $conThread .= "...";
      return $conThread;
    }
}
