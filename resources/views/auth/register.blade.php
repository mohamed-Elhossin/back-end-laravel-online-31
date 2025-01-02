@extends('layouts.app')



@section('content')
    <div class="container col-md-6">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <h4> Register Account
            </h4>
            <div class="card-body">
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" value="{{ old('password') }}" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmation Password</label>
                        <input type="password" value="{{ old('password') }}" name="password_confirmation"
                            class="form-control">
                    </div>

                    <div class="d-grid my-2">
                        <button class="btn btn-info"> Submit </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
