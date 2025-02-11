<?php

namespace App\Http\Controllers;

use App\Models\User as Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
  {
    return view('authors.index', [
      'title' => 'List Authors',
      'authors' => Author::latest()->get()
    ]);
  }

  public function show(Author $author)
  {
    return view('posts.index', [
      'title' => 'Post By Author : ' . $author->name,
      'posts' => $author->posts,
      // 'posts' => $author->posts->load(['category', 'author']),
    ]);
  }
}
