<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function category(){
        $categories = Category::latest()->paginate(8);
        return view('articles.category', [
            "categories" => $categories
        ]);
    }
    public function add(){
        return view('articles.category-add');
    }
    public function create(){
        $validator = validator(request()->all(),[
            "name" => "required",
            "status" => "required",
            "photo" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $category = new Category;
        $category->name = request()->name;
        $category->status = request()->status;
        $category->photo = request()->photo;
        try{
            $category->save();
        }catch(Exception $e){
            echo $e->getMessage();
        }

        return redirect('/categories')->with('info', 'Category Added Sucessfully');
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/categories')->with('delete', 'Category deleted successful');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('articles.category-update', [
            "category" => $category
        ]);
    }
    public function update($id){
        $validator = validator(request()->all(),[
            "name" => "required",
            "status" => "required",
            "photo" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $category = Category::find($id);
        $category->name = request()->name;
        $category->status = request()->status;
        $category->photo = request()->photo;
        try{
            $category->save();
        }catch(Exception $e){
            echo $e->getMessage();
        }

        return redirect('/categories')->with('update', 'Category Updated Sucessfully');
    }
}
