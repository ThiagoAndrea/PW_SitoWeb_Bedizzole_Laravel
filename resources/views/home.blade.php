@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')

@section('left_navbar')
<li class="nav-item active"><a class="nav-link" aria-current="page" href="home.php">Home</a>
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