<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function store(Request $request){

        $image_name = $this->uploadImage($request);

        $post = new Post();
        $post->title = $request->post_title;
        $post->category_id  = $request->category_id;
        $post->image = $image_name;
        $post->content = $request->post_content;
        $post->save();


        return back()->with(['message'=>'Post Added Successfully']);

    }

    public function uploadImage(Request $request){

        $path = public_path("post_images");

        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('post_image');

        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());

        $full_path = $file->move($path,$fileName);

        return $fileName;

    }

    public function adminIndex(){
        
        $posts  = Post::all();

        return view('admin.posts.index',compact('posts'));

    }

    public function index(){

        $posts  = Post::all();
        return view('index',compact('posts'));
        
    }

    // show single post / post details
    public function show($id){

        $post = Post::find($id);
        $categories = Category::all();

        return view('post-details',compact('post','categories'));

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

        return back()->with(['message'=>'updated successfully!']);
    }


    public function delete($id){

        $post = Post::find($id);
        $post->delete();

        return back()->with(['message'=>'post updated successfully!']);
    }

}
