<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ReplyResource;
use App\Notifications\ReplyNotification;
use Illuminate\Support\Facades\Notification;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,Request $request)
    {
        ///question id come form $question automatically inject
       $reply=$question->replies()->create($request->all());
        if($reply->user_id!==$question->user_id){
            $user=$question->user;
            $user->notify(new ReplyNotification($reply));
        }
       return response(['reply'=>new ReplyResource($reply)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question,Reply $reply,Request $request)
    {
        $reply->update($request->all());
        return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Reply $reply)
    {
        $id=$question->user->id;
        DB::table('notifications')->where('notifiable_id',$id)->delete();
        $reply->delete();
        return response('Deleted');
    }
   
}
