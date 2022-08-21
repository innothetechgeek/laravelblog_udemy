<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Reply;

class CommentController extends Controller
{
    //
    public function store(Request $request){

        $comment = new Comment;
        $comment->visitor_name = $request->visitor_name;
        $comment->visitor_email = $request->visitor_email;
        $comment->visitor_website = $request->visitor_website;
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();

        return back()->with('message', 'Comment added successfully!');

    }

    public function addReply(Request $request){

        $reply = new Reply;
        $reply->visitor_email = $request->visitor_email;
        $reply->visitor_name = $request->visitor_name;
        $reply->visitor_website = $request->visitor_website;
        $reply->comment_id  = $request->comment_id;
        $reply->body = $request->reply_body;
        $reply->save();

    }
}
