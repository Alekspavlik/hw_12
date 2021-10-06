<?php

namespace Hillel\Controllers;

use Hillel\Models\Category;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        if ($request->method() == 'POST') {
            if(!$request->has('id')) {
                Category::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            } else {
                $category = Category::find($request->get('id'));
                $category->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            }

            header('Location: /categories');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['category'] = Category::find($id);
        }

        return view('categories.form', $data);
    }

    public function delete()
    {
        $category = Category::find(request()->route()->parameter('id'));
        $category->delete();

        header('Location: /categories');
    }
}
