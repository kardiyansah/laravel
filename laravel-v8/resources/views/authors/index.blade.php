@extends('layouts.main')

@section('content')
    <h1 class="my-3 text-center">List Authors</h1>

    @foreach ($authors as $author)
    <ul>
      <li>
        <h2><a href="/authors/{{ $author->username }}">{{ $author->name }}</a></h2>
      </li>
    </ul>
    @endforeach
@endsection