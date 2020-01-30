<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['owner_id', 'content' , 'name'];

    public function like(){
        return $this->belongsTo('App\Like');
    }
}
