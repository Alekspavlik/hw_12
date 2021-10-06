<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;
use Hillel\Models\Category;
use Hillel\Models\Tag;

class PostController
{
    public function index()
    {
        $posts = \Hillel\Models\Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function form()
    {
        $request = request();

        $data = [];
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();

        if ($request->method() == 'POST') {
            if(!$request->has('id')) {
                Post::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('category'),
                ])->tags()->sync($request->get('tag'));
            } else {
                $post = Post::find($request->get('id'));
                $post->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('category'),
                ]);
                $post->tags()->sync($request->get('tag'));
            }

            header('Location: /posts');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['post'] = Post::find($id);
        }

        return view('posts.form', $data);
    }
    public function delete()
    {
        $post = Post::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /posts');
    }
}