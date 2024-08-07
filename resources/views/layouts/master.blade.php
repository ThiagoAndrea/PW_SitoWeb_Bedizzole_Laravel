<!DOCTYPE html>

<html>

<head>
    <title> @yield('titolo_head')</title>
    <link rel="icon" type="imagex-icon" href="{{ asset('img/base/logo.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fogli di stile -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>


    <!-- jQuery e plugin JavaScript  -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('js/CheckAdminForms.js') }}"></script>
    <script src="{{ asset('js/CheckAuthForms.js') }}"></script>
    <script src="{{ asset('js/Search.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <div class="container">
        <header class="intestazione">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col text-center">
                    <img src="{{ asset('img/base/logo.png') }}" class="img-fluid img-header">

                </div>
                <div class="col text-center">
                    <h1>FC Bedizzole</h1>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('img/base/logo.png') }}" class="img-fluid img-header">
                </div>
            </div>
        </header>
    </div>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item dropdown {{ request()->routeIs('squadra.show*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Squadre</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($squadre as $squadra)
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('squadre/' . $squadra->id_squadra) ? 'active' : '' }}"
                                            href="{{ route('squadra.show', $squadra->id_squadra) }}">{{ $squadra->nome }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('notizie.index') ? 'active' : '' }}"
                                href="{{ route('notizie.index') }}">Notizie</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('showShop') ? 'active' : '' }}"
                                href="{{ route('showShop') }}">Shop</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('showContatti') ? 'active' : '' }}"
                                href="{{ route('showContatti') }}">Contatti</a></li>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['privilegi'] == 0)
                            <li class="nav-item"><a
                                    class="nav-link {{ request()->routeIs('carrello.show') ? 'active' : '' }}"
                                    href="{{ route('carrello.show') }}"><iconify-icon
                                        icon="bi:cart-fill"></iconify-icon>Carrello</a></li>
                        @endif
                        @if (isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilegi'] == 2)
                            <li class="nav-item dropdown d-flex me-2">
                                <a class="nav-link dropdown-toggle {{ request()->routeIs('giocatori.index') || request()->routeIs('prodotti.index') ? 'active' : '' }}"
                                    href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Admin</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                    <li><a class="dropdown-item" href="{{ route('giocatori.index') }}">Gestione
                                            Rose</a></li>
                                    <li><a class="dropdown-item" href="{{ route('prodotti.index') }}">Gestione Shop</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('allenatori.index') }}">Gestione
                                            Allenatori</a></li>
                                    <li><a class="dropdown-item" href="{{ route('ordini.index') }}">Visualizza
                                            ordini</a></li>
                                </ul>
                            </li>
                        @endif
                        @if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
                            <li class="nav-item dropdown d-flex me-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin"
                                    role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">{{ $_SESSION['loggedName'] }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                    @if ($_SESSION['privilegi'] == 0)
                                        <li><a class="dropdown-item" href="{{ route('ordineUtente.index') }}">I miei
                                                ordini</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>
    </div>

    @yield('breadcrumb')

    @yield('header_section')

    @yield('contenuto')


    <div class="container footer-container">
        <footer id="bottom" class="row d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col  text-center">
                    <img src="{{ asset('img/base/logo.png') }}" class="img-fluid logo-footer">
                </div>
                <div class="col text-center">
                    <h3>Contatti</h3>
                    <h5>Email: esempio@gmail.com</h5>
                    <h5>Telefono: 3334445556</h5>
                </div>
                <div class="col text-center">
                    <h3>Indirizzo</h3>
                    <h5>Campo Sportivo Comunale "Siboni"</h5>
                    <h5>Via G.Garibaldi, 25081 Bedizzole BS</h5>
                    <a type="button"
                        href="https://google.com/maps/place/Campo+Sportivo+Comunale+'Siboni',+Via+G.+Garibaldi,+25081+Bedizzole+BS/@45.5127189,10.4039723,17z/data=!3m1!4b1!4m6!3m5!1s0x47819a19ad2ec6d5:0xe9739a26d5580903!8m2!3d45.5127056!4d10.4063673!16s%2Fg%2F11b8tb33tp?hl=it&entry=ttu"
                        target="_blank" class="btn btn-footer d-flex align-items-center">
                        <iconify-icon class="icon-footer" icon="simple-icons:googlemaps"></iconify-icon>Google Maps

                    </a>

                </div>
                <div class="col text-center">
                    <h3>Seguici</h3>
                    <a type="button" href="https://www.facebook.com/fcbedizzole/" target="_blank"
                        class="btn btn-footer btn-facebook d-flex align-items-center">
                        <iconify-icon class="icon-footer" icon="ic:baseline-facebook"></iconify-icon>Facebook

                    </a>
                    <a href="https://www.instagram.com/fcbedizzole/" target="_blank"
                        class="btn btn-footer btn-facebook d-flex align-items-center">
                        <iconify-icon class="icon-footer" icon="mdi:instagram"></iconify-icon> Instagram
                    </a>
                </div>
            </div>

            <div class="row copyrights">
                <p>&copy; 2023 FC Bedizzole. Tutti i diritti riservati.</p>
            </div>
        </footer>

    </div>
</body>

</html>
