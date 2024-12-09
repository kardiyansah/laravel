@extends('layout.main')

@section('title', 'Home Pages')

{{-- style --}}
@section('style')
<style>
  div.card a.btn:active {
      scale: .8;
  }
</style>
@endsection
{{-- end of style --}}

{{-- content --}}
@section('container')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $student->name }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">{{ $student->email }}</h6>
                      <p class="card-text">Address: {{ $student->address }}</p>
                      <p class="card-text">Major: {{ $student->major }}</p>
                      <a href="/students" class="card-link btn btn-success">Back</a>
                      <a href="/students/{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
                      <form action="/students/{{ $student->id }}" method="post" class="d-inline-flex">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
{{-- end of content --}}