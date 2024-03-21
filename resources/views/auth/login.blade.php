@extends('layouts.master')

@section('titolo_head', 'Login - FC Bedizzole')


@section('left_navbar')
<li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">Squadre</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="giovanissimiU14.php">Giovanissimi U14</a></li>
        <li><a class="dropdown-item" href="esordientiU13.php">Esordienti U13</a></li>
        <li><a class="dropdown-item" href="esordientiU12.php">Esordienti U12</a></li>
        <li><a class="dropdown-item" href="pulciniU11.php">Pulcini U11</a></li>
        <li><a class="dropdown-item" href="pulciniU10.php">Pulcini U10</a></li>
        <li><a class="dropdown-item" href="piccoliAmiciU9.php">Piccoli Amici U9</a></li>
        <li><a class="dropdown-item" href="scuolaCalcio.php">Scuola Calcio</a></li>
    </ul>
</li>
<li class="nav-item"><a class="nav-link" href="notizie.php">Notizie</a></li>
<li class="nav-item"><a class="nav-link" href="modulistica.php">Modulistica</a></li>
<li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
<li class="nav-item"><a class="nav-link" href="contatti.php">Contatti</a></li>
@endsection

@section('right_navbar')

<li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon> Carrello</a></li>;
                        <li class="nav-item dropdown d-flex me-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                <li><a class="dropdown-item" href="gestioneRose.php">Gestione Rose</a></li>
                                <li><a class="dropdown-item" href="gestioneShop.php">Gestione Shop</a></li>
                            </ul>
                        </li>
      
@endsection


@section('breadcrumb')
<div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
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
                    <img class="img-fluid w-100" src="img/sfondo_login.jpg" />
                </div>
                <div class="col-md-6 text-center" id="loginWindow">
                    <h2 class="display-6 fw-bold mb-5">
                        <span>
                            Login
                        </span>
                    </h2>
                    <form method="post" data-bs-theme="light" action='{{route('user.login')}}'>
                        <div class="mb-3">
                            <input class="shadow form-control" type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="mb-3">
                            <input class="shadow form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-success shadow" type="submit" name="login-submit">Log in</button>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="ricorda">
                        </div>
                        <div>
                            <p>Non sei ancora iscritto? Clicca <a href="registrazione.php">qui per registrarti</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection