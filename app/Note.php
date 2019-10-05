<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $primaryKey = 'url'; // or null

    public $incrementing = false;
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function request(){
        return $this->hasMany('App\Request');
    }

    public function Change(){
        return $this->hasMany('App\Change');
    }
}

