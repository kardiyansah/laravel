@extends('layouts.main')

@section('content')
    <h1 class="mt-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="get">
            @if (request("category"))
                <input type="hidden" name="category" value="{{ request("category") }}">
            @endif
            @if (request("author"))
                <input type="hidden" name="author" value="{{ request("author") }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request("search") }}" autofocus>
                <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
            </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <img src="{{ asset('img/' . $posts[0]->image) }}" class="card-img-top" height="350" alt="Default Image">
        @else    
            <img src="{{ asset('img/default.jpg') }}" class="card-img-top" height="350" alt="Default Image">
        @endif
        <div class="card-body text-center">
            <h3><a class="text-decoration-none card-title" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
            <p>
                <small>
                    By: <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> 
                    in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more</a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4  mb-3">
            <div class="card">
                <a href="/posts?category={{ $post->category->slug }}">
                    <div class="position-absolute top-0 end-0 text-white px-3 py-2" style="background-color: rgba(0, 0, 0, .5)">{{ $post->category->name }}</div>
                </a>
                <img src="{{ asset('img/' . mt_rand(2, 3) . '.jpg') }}" class="card-img-top" alt="Example Photo">
                <div class="card-body">
                <h4><a class="text-decoration-none card-title" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
                    <p>
                    <small>
                        By: <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> 
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                </p>
                {{-- <p>{!! Str::limit($post->body, 200, '<a href="/posts/' . $post->slug . '"> more...</a>') !!}</p> --}}
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <p class="text-danger text-center fs-1">Post Not Found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection