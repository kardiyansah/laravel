<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'title' => 'Post Categories',
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('posts.index', [
            'title' => 'Post By Category : ' . $category->name,
            'posts' => $category->posts,
            // 'posts' => $category->posts->load(['category', 'author']),
        ]);
    }
}
