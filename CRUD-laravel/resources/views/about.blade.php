{{-- tanda / bisa diganti dengan . --}}
@extends('layout.main')

@section('title', 'About Pages')

{{-- content --}}
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Hello, {{ $name }}</h1>
            </div>
        </div>
    </div>
@endsection
{{-- end of content --}}