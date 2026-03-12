<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Post1',
                'description' => 'post description',
                'creator' => [
                    "id" => 1,
                    'name' => 'Mohamed',
                    'email' => 'mw@mw.com',
                    'created_at' => '2026-03-11 13:59:00',
                ],
                'created_at' => '2026-03-11 13:59:00',
            ],
            [
                'id' => 1,
                'title' => 'Post2',
                'description' => 'post description 2',
                'creator' => [
                    "id" => 2,
                    'name' => 'Ahmed',
                    'email' => 'ahmed@mw.com',
                    'created_at' => '2026-03-11 13:59:00',
                ],
                'created_at' => '2026-03-11 13:59:00',
            ],

        ];

        return view('posts.index', ['posts' => $posts]);
    }

    public function show()
    {
        $innerPost = [
            'id' => 1,
            'title' => 'Post2',
            'description' => 'post description 2',
            'creator' => [
                "id" => 2,
                'name' => 'Ahmed',
                'email' => 'ahmed@mw.com',
                'created_at' => '2026-03-11 13:59:00',
            ],
            'created_at' => '2026-03-11 13:59:00',
        ];

        return view('posts.show', ['post' => $innerPost]);
    }

    public function destroy($postId)
    {
        return to_route('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return to_route('posts.index');
    }

    public function edit()
    {
        $innerPost = [
            'id' => 1,
            'title' => 'Post2',
            'description' => 'post description 2',
            'creator' => [
                "id" => 2,
                'name' => 'Ahmed',
                'email' => 'ahmed@mw.com',
                'created_at' => '2026-03-11 13:59:00',
            ],
            'created_at' => '2026-03-11 13:59:00',
        ];
        return view('posts.edit', ["post" => $innerPost]);
    }

    public function update()
    {
        return to_route("posts.index");
    }
}
