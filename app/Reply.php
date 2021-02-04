<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot(){

        parent::boot();

        static::creating(function($reply){

            $reply->user_id=auth()->user()->id;
        
        });
    }
    protected $fillable=['body','question_id','user_id'];

    public function question(){

        return $this->belongsTo('App\Question');
    
    }
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function like(){

        return $this->hasMany('App\Like');

    }
}
