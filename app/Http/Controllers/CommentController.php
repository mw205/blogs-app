<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    function store(Request $request, Post $post)
    {
        $post->comments()->create(
            [
                "body" => $request->body,
                "user_id" => 1,
            ]
        );
        return back();
    }
}
