<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //protected $guarded=[];
    protected $fillable=['title','slug','body','user_id','category_id'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function($question){
            $question->slug=Str::slug($question->title);
        });
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function getPathAttribute(){
        return "/question/$this->slug";
    }
}
