@extends('layouts.app')


@section('content')
    <div class="container col-8">
        <h3>Show Student {{ $student->id }}
            <a class="btn btn-link float-end" href="{{ route('student.create') }}"> Create New</a>
        </h3>
        <div class="card">

            <div class="card-body">
                <h5> Name : {{ $student->name }} </h5>
                <hr>
                <h5> email : {{ $student->email }} </h5>
                <hr>
                <h5> GPA : {{ $student->GPA }} </h5>
                <hr>
                <h5> level : {{ $student->lavel->title }} </h5>
                <hr>



            </div>
        </div>
    </div>
@endsection
