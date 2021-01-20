<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Question;
use App\Http\Resources\QuestionResource;
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
       // auth()->user()->question()->create($request->all());
        Question::create($request->all());
        return response('success');
    }
    public function update(Request $request,Question $question){
        $question->update($request->all());
        return response('updated');
     }

}
