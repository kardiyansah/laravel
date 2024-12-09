@extends('layout.main')

@section('title', 'Mahasiswa Pages')


@section('style')
 <style>
    .badge {
        text-decoration: none;
    }

    .badge:active {
        scale: .8;
    }
 </style>    
@endsection

{{-- content --}}
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md">

                
                <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Major</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($mahasiswa as $item)
                     <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->major }}</td>
                        <td>
                            <a href="" class="badge text-bg-success">Edit</a>
                            <a href="" class="badge text-bg-danger">Delete</a>
                        </td>
                     </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{-- end of content --}}