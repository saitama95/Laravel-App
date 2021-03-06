<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','slug'];
    //protected $guarded=[];
    protected static function boot(){   
        
        parent::boot();

        static::creating(function($category){
            $category->slug=Str::slug($category->name);
        });
    }
    public function getPathAttribute(){
        return asset("api/categories/$this->slug");
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
