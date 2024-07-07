@extends('layouts.master')

@section('titolo_head', 'Registrazione - FC Bedizzole')

@section('breadcrumb')
<div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Login</li>
                <li class="breadcrumb-item active" aria-current="page">Registrazione</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenuto')
<section class="py-4 p4-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center" id="loginWindow">
                    <h2 class="display-6 fw-bold mb-5">
                        <span>
                            Registrazione
                        </span>
                    </h2>
                    <form method="post" data-bs-theme="light" action="{{route('user.registration')}}">
                        @csrf
                        <div class="mb-3">
                            <input class="shadow form-control col-6" type="nome" name="nome" placeholder="Nome" />
                        </div>
                        <div class="mb-3">
                            <input class="shadow form-control col-6" type="cognome" name="cognome" placeholder="Cognome" />
                        </div>
                        <div class="mb-3">
                            <input class="shadow form-control col-6" type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="mb-3">
                            <input class="shadow form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="mb-3">
                            <input class="shadow form-control" type="password" name="password" placeholder="Conferma password" />
                        </div>
                        <div class="row">
                            <div class="mb-5 col">
                                <button class="btn btn-secondary shadow" type="submit">Annulla</button>
                            </div>
                            <div class="mb-5 col">
                                <button class="btn btn-success shadow" type="submit" name="register-submit">Registrati</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-center">
                    <img class="img-fluid w-100" src="img/sfondo_login.jpg" />
                </div>
            </div>
        </div>
    </section>
@endsection