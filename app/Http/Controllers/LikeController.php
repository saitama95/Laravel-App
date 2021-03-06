<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Reply;
use App\Events\LikeEvent;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');//only user login can like and dislike
    }
    public function likeIt(Reply $reply){
        $reply->like()->create([
            'user_id'=>auth()->id(),
        ]);
        broadcast(new LikeEvent($reply->id,1))->toOthers();
    }
    public function deleteLike(Reply $reply){
      
        $reply->like()->where('user_id',auth()->id())->first()->delete();
        broadcast(new LikeEvent($reply->id,0))->toOthers();
        
    }
}
