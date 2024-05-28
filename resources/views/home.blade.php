@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')

@section('left_navbar')
<li class="nav-item active"><a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">Squadre</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{route('rose')}}">Giovanissimi U14</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Esordienti U13</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Esordienti U12</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Pulcini U11</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Pulcini U10</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Piccoli Amici U9</a></li>
        <li><a class="dropdown-item" href="{{route('rose')}}">Scuola Calcio</a></li>
    </ul>
</li>
<li class="nav-item"><a class="nav-link" href="notizie.php">Notizie</a></li>
<li class="nav-item"><a class="nav-link" href="modulistica.php">Modulistica</a></li>
<li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
<li class="nav-item"><a class="nav-link" href="contatti.php">Contatti</a></li>
@endsection

@section('right_navbar')

<li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon> Carrello</a></li>
                        <li class="nav-item dropdown d-flex me-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                <li><a class="dropdown-item" href="gestioneRose.php">Gestione Rose</a></li>
                                <li><a class="dropdown-item" href="gestioneShop.php">Gestione Shop</a></li>
                            </ul>
                        </li>
@if($logged)
<li class="nav-item"><a class="nav-link" href="#">Benvenuto {{$loggedName}} </a></li>
<li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
@else
<li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">Login</a></li>
@endif      
@endsection