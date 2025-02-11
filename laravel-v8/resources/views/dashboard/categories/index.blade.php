@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <form action="/logout" method="post" class="d-inline">
        @csrf
        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure want to log out?')"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
      </form>
    </div>
  </div>
</div>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
  {{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive small col-md-6">
<a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><i data-feather="eye"></i></a>
          <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i data-feather="edit"></i></a>
          <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection