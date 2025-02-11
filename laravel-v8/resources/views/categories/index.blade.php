@extends('layouts.main')

@section('content')
    <h1 class="my-3 text-center">Post Categories</h1>

    <div class="row">
      @foreach ($categories as $category)
      <div class="col-md-4 mb-3">
        <a href="/categories/{{ $category->slug }}">
          <div class="card text-bg-dark">
            <img src="{{ asset('img/' . mt_rand(2, 3) . '.jpg') }}" class="card-img" alt="Example Photo">
            <div class="card-img-overlay d-flex align-items-center p-0">
              <h5 class="text-center card-title flex-fill p-3 fs-3" style="background-color: rgba(0, 0, 0, .7)">{{ $category->name }}</h5>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
@endsection