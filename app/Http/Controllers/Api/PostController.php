<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(10);

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): PostResource
    {
        $data = $request->validated();

        if ($request->hasFile("post_image")) {
            $data['post_image'] = $request->file("post_image")->store("posts", "public");
        }

        $post = Post::create($data);

        return new PostResource($post->load('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post->load('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $data = $request->validated();

        if ($request->hasFile("post_image")) {
            if ($post->post_image) {
                Storage::disk("public")->delete($post->post_image);
            }
            $data["post_image"] = $request->file("post_image")->store("posts", "public");
        }

        $post->update($data);

        return new PostResource($post->load('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): \Illuminate\Http\Response
    {
        $post->delete();

        return response()->noContent();
    }
}
