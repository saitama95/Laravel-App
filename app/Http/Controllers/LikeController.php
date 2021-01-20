<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Reply;
use App\User;
class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');//only user login can like and dislike
    }
    public function likeIt(Reply $reply){
        $reply->like()->create([
            //'user_id'=>auth()->id(),
            'user_id'=>1,
        ]);
    }
    public function deleteLike(Reply $reply){
       // $reply->like()->where('user_id',auth()->id)->first()->delete();
        $reply->like()->where('user_id',1)->first()->delete();
    }
}
