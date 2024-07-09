@extends('layouts.master')

@section('titolo_head', 'Registrazione - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.login') }}">Login</a></li>
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
                    <form id="registrazione-form" method="post" data-bs-theme="light"
                        action="{{ route('user.registration') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="mb-3 col-md-7">
                                <input class="shadow form-control col-6" type="nome" name="nome" placeholder="Nome" />
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-3 col-md-7">
                                <input class="shadow form-control col-6" type="cognome" name="cognome"
                                    placeholder="Cognome" />
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-3 col-md-7">
                                <input class="shadow form-control col-6" type="email" name="email" placeholder="Email"
                                    id="email" />
                                <span class="error-span" id="email-invalida"></span>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-3 col-md-7">
                                <input class="shadow form-control" type="password" name="password" id="password"
                                    placeholder="Password" />
                                <span class="error-span" id="password-invalida"></span>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-3 col-md-7">
                                <input class="shadow form-control" type="password" id="confermaPassword"
                                    name="confermaPassword" placeholder="Conferma password" />
                                <span class="error-span" id="confermaPassword-invalida"></span>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="mb-5 col-md-4">
                                <button class="btn btn-secondary shadow" type="submit">Annulla</button>
                            </div>
                            <div class="mb-5 col-md-4">
                                <button class="btn btn-success shadow" type="submit"
                                    name="register-submit" onclick="event.preventDefault(); checkRegistrazione()">Registrati</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-center">
                    <img class="img-fluid w-100 img-login" src="{{ asset('img/base/sfondo_login.jpg') }}" />
                </div>
            </div>
        </div>
    </section>



@endsection
