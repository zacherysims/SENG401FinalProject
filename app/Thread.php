<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thread extends Model
{
    //
    protected $fillable = ['user','title', 'content'];
    public $timestamps = false;
    protected $table = 'threads';

    
    public function getUser(){
        $user = DB::table('users')->where([
            ['email','=', $this->user]
        ])->first();
        return $user->name;
    }
}
