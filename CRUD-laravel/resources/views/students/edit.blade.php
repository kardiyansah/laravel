@extends('layout.main')

@section('title', 'Form Edit Data')

{{-- content --}}
@section('container')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h1>Form Edit Data Student</h1>

                <form action="/students/{{ $student->id }}" method="post">
                    @csrf
					@method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Your Name Here" value="{{ $student->name }}">
                        @error('name')
                         <div class="invalid-feedback">
                            {{ $message }}
                         </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Your Email Here" value="{{ $student->email }}">
                        @error('email')
                         <div class="invalid-feedback">
                            {{ $message }}
                         </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter Your Address Here" value="{{ $student->address }}">
                        @error('address')
                         <div class="invalid-feedback">
                            {{ $message }}
                         </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <input type="text" class="form-control @error('major') is-invalid @enderror" name="major" id="major" placeholder="Enter Your Major Here" value="{{ $student->major }}">
                        @error('major')
                         <div class="invalid-feedback">
                            {{ $message }}
                         </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>

            </div>
        </div>
    </div>
@endsection
{{-- end of content --}}