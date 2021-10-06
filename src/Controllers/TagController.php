<?php

namespace Hillel\Controllers;

use Hillel\Models\Tag;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        if ($request->method() == 'POST') {
            if(!$request->has('id')) {
                Tag::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            } else {
                $tag = Tag::find($request->get('id'));
                $tag->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            }

            header('Location: /tags');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
        }
        return view('tags.form', $data);
    }

    public function delete()
    {
        $tag = Tag::find(request()->route()->parameter('id'));
        $tag->delete();

        header('Location: /tags');
    }
}