@extends('layouts.main')

@section('content')
<div class="wrapper mt-3">
  <h1>About Page</h1>
  <h3>{{ $name }}</h3>
  <p>{{ $email }}</p>
  <img src="img/{{ $image }}" alt="Example Photo" width="200" class="img-thumb">
</div>
@endsection