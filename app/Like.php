<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['question_id', 'user_id' , 'name'];

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
