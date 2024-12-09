@extends('layout.main')

@section('title', 'Home Pages')

{{-- style --}}
 @section('style')
  <style>
    ul.list-group a {
        text-decoration: none;
    }

    ul.list-group a:active {
        scale: .8;
    }
  </style>
 @endsection
{{-- end of style --}}

{{-- content --}}
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="my-3">List Students</h1>

                <a href="/students/create" class="btn btn-primary mb-3">Create New Data</a>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <ul class="list-group">
                    @foreach ($students as $student)
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $student->name }}
                        <a href="/students/{{ $student->id }}" class="badge text-bg-primary rounded-pill">Details</a>
                     </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
{{-- end of content --}}