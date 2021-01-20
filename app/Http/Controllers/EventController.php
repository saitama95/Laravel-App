<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Events\OrderShipped;
class EventController extends Controller
{
    function index(){
       return view('index');
    }
    function store(Request $req){
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();
        event(new OrderShipped($user));
        return redirect()->back();
    }
}
