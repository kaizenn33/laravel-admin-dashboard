<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Condition;
use App\Models\Type;

use function Ramsey\Uuid\v1;

class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $items = Item::latest()->paginate(8);
        return view('articles.index', [
            "items" => $items
        ]);
    }
    public function delete($id){
        $item = Item::find($id);
        $item->delete();
        return redirect('/items')->with('info', 'Item Deleted Successfully');
    }
    public function add(){
        $categories = Category::all();
        $condition = Condition::all();
        $type = Type::all();

        return view('articles.add', [
            "categories" => $categories,
            "conditions" =>$condition,
            "types" => $type
         ]);
    }
    public function create(){
        $validator = validator(request()->all(),[
            "name" => "required",
            "category_id" => "required",
            "price" => "required",
            "description" => "required",
            "condition" => "required",
            "type" => "required",
            "status" => "required",
            "image" => "required",
            "owner_name" => "required",
            "phone" => "required",
            "address" => "required",

        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $item = new Item;
        $item->name = request()->name;
        $item->category_id = request()->category_id;
        $item->price = request()->price;
        $item->description = request()->description;
        $item->condition_id = request()->condition;
        $item->type_id = request()->type;
        $item->status = request()->status;
        $item->photo = request()->image;
        $item->ownerName = request()->owner_name;
        $item->contactNumber = request()->phone;
        $item->address = request()->address;
        $item->location = request()->location;
        $item->save();

        return redirect('/items');
    }
    public function edit($id){
        $items = Item::find($id);
        $categories = Category::all();
        $condition = Condition::all();
        $type = Type::all();

        return view('articles.update', [
            "items" => $items,
            "categories" => $categories,
            "conditions" =>$condition,
            "types" => $type
        ]);
    }
    public function update($id){
        $validator = validator(request()->all(),[
            "name" => "required",
            "category_id" => "required",
            "price" => "required",
            "description" => "required",
            "condition" => "required",
            "type" => "required",
            "status" => "required",
            "image" => "required",
            "owner_name" => "required",
            "phone" => "required",
            "address" => "required",

        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $item = Item::find($id);
        $item->name = request()->name;
        $item->category_id = request()->category_id;
        $item->price = request()->price;
        $item->description = request()->description;
        $item->condition_id = request()->condition;
        $item->type_id = request()->type;
        $item->status = request()->status;
        $item->photo = request()->image;
        $item->ownerName = request()->owner_name;
        $item->contactNumber = request()->phone;
        $item->address = request()->address;
        $item->location = request()->location;
        $item->save();

        return redirect('/items')->with('update', 'Item Updated Successfully');
    }
}
