<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';
    public function user(){
        return $this->belongsTo('App\Models\user', 'id', 'postId');
    }
    use HasFactory;
}
