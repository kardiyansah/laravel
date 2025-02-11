@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <article class="mt-5 mb-3">
          <h2>{{ $post->title }}</h2>
          <small>By: <a href="">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small>
          @if ($post->image)
            <img src="{{ asset('img/' . $post->image) }}" class="img-fluid my-3 img-responsive" alt="Default Image">
          @else
            <img src="{{ asset('img/default.jpg') }}" class="img-fluid my-3" alt="Default Image">
          @endif
          {!! $post->body !!}
        </article>

        <a href="/posts" class="btn btn-primary mb-5">Back To Posts</a>
      </div>
    </div>
  </div>
@endsection