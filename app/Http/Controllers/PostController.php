<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function store(Request $request){

        $post = new Post();
        $post->title = $request->post_title;
        $post->category_id  = $request->category;
        $post->content = $request->post_content;
        $post->save();

    }

    public function index(){

        return view('admin.posts.index');

    }

    public function edit($id){

        $post = Post::find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request,$id){

        $post = Post::find($id);
        $post->title = $request->post_title;
        $post->category_id  = $request->category_id;
        $post->content = $request->post_content;
        $post->save();

        return back()->with(['success'=>'updated successfully!']);
    }
}
