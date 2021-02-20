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
    function index(){
        //dd(auth()->user()->notifications);
        return [
            'unread'=>NotificationResource::collection(auth()->user()->unReadNotifications),
            'read'=>NotificationResource::collection(auth()->user()->notifications),
        ];
    }
    function imarkasreadndex($id){
        auth()->user()->notifications->where('id',$id)->markAsRead();
    }
}
