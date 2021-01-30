<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\Response;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    public function index(){
        return QuestionResource::collection(Question::latest()->get());
        
    }
    public function show(Question $question){
        return new QuestionResource($question);   
    }
    public function destroy(Question $question){
            $question->delete();
            return response('deleted');
    }
    public function store(Request $request){
        $quest=new Question();
        $quest->title=$request->title;
        $quest->body=$request->body;
        $quest->category_id=$request->category_id;
        $quest->user_id=auth()->user()->id;
        $quest->save();
        return response(new QuestionResource($quest),200);
        
    }
    public function update(Request $request,Question $question){
        $question->update($request->all());
        return response('updated');
     }

}
