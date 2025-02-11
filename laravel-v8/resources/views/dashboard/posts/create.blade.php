@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Form Create Post</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <form action="/logout" method="post" class="d-inline">
        @csrf
        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure want to log out?')"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-8">
    <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Title" autofocus>
        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Slug">
        @error('slug')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" name="category_id">
          @foreach ($categories as $category)
          @if ($category->id == old('category_id'))
            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-4">
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary mb-3">Create New Post</button>
    </form>
  </div>
</div>
@endsection