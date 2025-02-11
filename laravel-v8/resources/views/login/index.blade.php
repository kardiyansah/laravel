@extends('layouts.main')

@section('content')
<div class="row justify-content-center el-center">
  <div class="col-md-4">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('login-failed'))
    <div class="alert alert-danger">
        {{ session('login-failed') }}
    </div>
    @endif

    <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" autofocus>
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign in</button>
      </form>
      <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
    </main>
  </div>
</div>
@endsection