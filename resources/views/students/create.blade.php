@extends('layouts.app')


@section('content')
    <div class="container col-6">
        <h3>Create Student
            <a class="btn btn-link float-end" href="{{ route('student.index') }}"> Back </a>
        </h3>
        <div class="card">


            <div class="card-body">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" value="{{ old('name') }}"
                            class="form-control @error('name')
                             is-invalid
                        @enderror  "
                            name="name">
                        @error('name')
                            <span class="text-danger"> Your must Enter Valida data </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Student GPA</label>
                        <input type="number" value="{{ old('GPA') }}" class="form-control" name="GPA">
                    </div>
                    <div class="form-group">
                        <label for="">Student email</label>
                        <input type="email" value="{{ old('email') }}" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Student Phone</label>
                        <select name="lavel_id" class="form-select my-2" id="">
                            <option disabled selected>-- Select Level --</option>
                            @foreach ($lavels as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid my-3">
                        <button class="btn btn-info">Create Student</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
