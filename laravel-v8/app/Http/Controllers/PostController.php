<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(request('category'));
        // $posts = Post::latest();
        // if (request("search")) {
        // $posts->whereAny(['title', 'body'], 'like', '%' . request("search") . '%');
        // $posts->where('title', 'like', '%' . request("search") . '%')
        //     ->orWhere('body', 'like', '%' . request("search") . '%');
        // dd(request('search'));
        // }
        $title = 'All Posts';

        if (request('category')) {
            $categery = Category::firstWhere('slug', request('category'));
            $title .= ' in ' . $categery->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title .= ' by ' . $author->name;
        }

        return view('posts.index', [
            'title' => $title,
            'posts' => Post::latest()->filter(request(["search", "category", "author"]))->paginate(7)->withQueryString(),
            // 'posts' => Post::latest()->get(),
            // 'posts' => Post::with(['author', 'category'])->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['title' => 'Post', 'post' => $post]);
    }
}
