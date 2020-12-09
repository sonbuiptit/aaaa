<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class user extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'user';
    public function Post(){
        return $this->hasMany('App\Models\post', 'id', 'id');
    }
    use HasFactory;
}
