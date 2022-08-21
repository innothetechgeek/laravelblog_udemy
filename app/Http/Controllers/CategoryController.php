<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //

    public function index(){
        
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function add(){

        return view('admin.categories.add');

    }

    public function store(Request $request){

        $category = new Category();
        $category->name = $request->cat_name;
        $category->save();

        return back()->with('message', 'category added successfully!');

    }

    public function delete($id){

        $category = Category::find($id);
        $category->delete();

        return back()->with('message','Category deleted successfuly!');

    }
}
