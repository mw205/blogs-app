<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact("posts"));
    }

    public function show(Post $post)
    {
        $post->load("comments.user");
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function restore()
    {
        Post::onlyTrashed()->restore();
        return to_route('posts.index');
    }

    public function store(StorePostRequest $request)
    {
        $title = request()->title;
        $description = request()->description;
        $userId = request()->user_id;
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $title = request()->title;
        $description = request()->description;
        $userId = request()->user_id;
        $post->update([
            "title" => $title,
            "description" => $description,
            "user_id" => $userId,
        ]);
        return to_route("posts.index");
    }
}
