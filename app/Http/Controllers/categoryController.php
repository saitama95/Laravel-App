<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use App\Category;
class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    public function store(Request $request){
        Category::collection(create($request->all()));
        return response('success',201);
    }
    public function index(){
       return  CategoryResource::collection(Category::all());
    }
    public function update(Category $category,Request $request){
        $category->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name)
        ]);
        return response('update',201);
    }
    public function show(Category $category){
        return new CategoryResource($category);
    }
    public function destroy(Category $category){
        $category->delete();
        return response('deleted');
    }
}
