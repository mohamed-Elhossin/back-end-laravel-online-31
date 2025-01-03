<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.index') }}">Student</a>
                    </li>
                    @endauth
                </ul>

                @guest
                    <div class="d-flex">
                        <a href="{{ route('register') }}" class="btn btn-success mx-3" type="submit">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-info" type="submit">login</a>
                    </div>
                @endguest

                @auth


                <form action="{{ route('logout') }}" class="d-flex" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">logout</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>




    <main class="pt-5">
        @yield('content')
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
