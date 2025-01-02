@extends('layouts.app')


@section('content')
    <div class="container col-8">
        <h3>List Student
            <a class="btn btn-link float-end" href="{{ route('student.create') }}"> Create New</a>
        </h3>
        <div class="card">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>

                        <td>Level</td>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($students as $item)
                        <tr>
                            <th>{{ $loop->iteration }} </th>
                            <th>{{ $item->name }} </th>
                            <th>{{ $item->lavel->title }} </th>
                            <th><a href="{{ route('student.show', $item->id) }}" class="btn btn-link text-info">Show</a>
                            </th>
                            <th><a href="{{ route('student.edit', $item->id) }}" class="btn btn-link text-warning">Edit</a>
                            </th>
                            <th><a href="{{ route('student.destroy', $item->id) }}" class="btn btn-link text-danger">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                </table>

                <div>
                    {{ $students->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection
