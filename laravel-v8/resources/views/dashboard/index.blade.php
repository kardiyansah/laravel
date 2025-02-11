@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <form action="/logout" method="post" class="d-inline">
        @csrf
        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure want to log out?')"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
      </form>
    </div>
  </div>
</div>
@endsection