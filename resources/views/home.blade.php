@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')

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