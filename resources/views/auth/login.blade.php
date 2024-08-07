@extends('layouts.master')

@section('titolo_head', 'Login - FC Bedizzole')


@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
@endsection


@section('contenuto')

    <section class="py-4 p4-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid w-100 img-login" src="{{ asset('img/base/sfondo_login.jpg') }}" />
                </div>
                <div class="col-md-6 text-center" id="loginWindow">
                    <h2 class="display-6 fw-bold mb-5">
                        <span>
                            Login
                        </span>
                    </h2>
                    <form method="post" data-bs-theme="light" action='{{ route('user.login') }}'>
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="mb-4 col-md-8 ">
                                <input class="shadow form-control" type="email" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-4 col-md-8">
                                <input class="shadow form-control" type="password" name="password" placeholder="Password" />
                            </div>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-success shadow" type="submit" name="login-submit">Log in</button>
                        </div>
                        <div>
                            <p>Non sei ancora iscritto? Clicca <a href="{{ route('user.registration') }}">qui per
                                    registrarti</a></p>
                        </div>
                        @if (session('error'))
                            <div id="errorAlert" class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script>
        // Script per mostrare l'alert e farlo scomparire dopo un certo tempo
        setTimeout(function() {
            document.getElementById('errorAlert').style.display = 'none';
        }, 3000); // Nasconde l'alert dopo 3 secondi (3000 millisecondi)
    </script>
@endsection
