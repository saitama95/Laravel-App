<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable=['title','slug','body','user_id','category_id'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function($question){

            $question->slug=Str::slug($question->title);
        });

        static::deleting(function ($question) {

            $question->replies()->delete();
        });
    }
    protected $with=['replies'];

    public function getRouteKeyName(){

        return 'slug';
    }
    public function user(){

        return $this->belongsTo('App\User');
    }
    public function replies(){

        return $this->hasMany('App\Reply')->latest();
    }
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function getPathAttribute(){

        return "/question/$this->slug";
    }
}
