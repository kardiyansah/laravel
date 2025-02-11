@extends('dashboard.layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-start">
    <div class="col-lg-8">
      <h2 class="my-3">{{ $post->title }}</h2>

      <a href="/dashboard/posts" class="btn btn-success"><i data-feather="arrow-left"></i> Back to my posts</a>
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i data-feather="edit"></i> Edit</a>
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i> Delete</button>
      </form>

      <article class=" mb-3">
        @if ($post->image)
          <img src="{{ asset('img/' . $post->image) }}" class="img-fluid my-3 img-responsive" alt="Default Image">
        @else
          <img src="{{ asset('img/default.jpg') }}" class="img-fluid my-3" alt="Default Image">
        @endif
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection