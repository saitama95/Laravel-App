<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use App\Notifications\ReplyNotification;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('jwt');//only user login can like and dislike
    // }
    function index(){
        return [
            'unread'=>NotificationResource::collection(auth()->user()->unReadNotifications),
            'read'=>NotificationResource::collection(auth()->user()->notifications),
        ];
    }
    function imarkasreadndex($id){
        auth()->user()->notifications->where('id',$id)->markAsRead();
    }
}
