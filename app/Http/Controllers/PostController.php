<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $data = $request->validated();
        if ($request->hasFile("post_image")) {
            $data['post_image'] = $request->file("post_image")->store("posts", "public");
        }
        Post::create($data);
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        if ($request->hasFile("post_image")) {

            if ($post->post_image) {
                Storage::disk("public")->delete($post->post_image);
            }
            $data["post_image"] = $request->file("post_image")->store("posts", "public");
        }
        $post->update($data);
        return to_route("posts.index");
    }
}
