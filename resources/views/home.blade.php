@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')


@section('contenuto')
<div class="container">
    <div class="container-notizie-home">
        <div class="row d-flex">
            <div class="col-md-12 text-center intestazione-notizie">
                <h1><a href="{{(route('notizie.index'))}}" class="anchor-ultime-notizie">Ultime notizie <span
                            class="ic--round-greater-than"></span></a></h1>
            </div>
            <div class="row d-flex">
                <div class="col-md-9 notizia-principale">
                    <a href="{{route('notizia.show', ['id_notizia' => $notizie[0]->id_notizia]) }}">
                        <h4 class="text-center">{{$notizie[0]->titolo}}</h4>
                        <img src="{{asset('img/notizie/' . $notizie[0]->foto)}}" class="img-fluid img-notizie" alt>
                    </a>
                </div>
                <div class="col-md-3 full-height">
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia' => $notizie[1]->id_notizia]) }}">
                            <h5 class="text-center">{{$notizie[1]->titolo}}</h5>
                        </a>
                    </div>
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia' => $notizie[2]->id_notizia]) }}">
                            <h5 class="text-center">{{$notizie[2]->titolo}}</h5>
                        </a>
                    </div>
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia' => $notizie[3]->id_notizia]) }}">
                            <h5 class="text-center">{{$notizie[3]->titolo}}</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between row-contatti">
        <div class="col-md-4 mb-4">
            <div class="home-widget">
                <div class="text-center">
                    <h1>Le nostre rose</h1>
                    <h4>Scopri i giovani calciatori:</h4>
                    @foreach($squadre as $squadra)
                        <a class="btn btn-vediRose" href="{{ route('squadra.show', ['squadra' => $squadra->id_squadra]) }}">
                            <h5>{{ $squadra->nome }}</h5>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">

            <div class="home-widget">
                <a class="btn btn-vediShop" href="{{route('showShop')}}">
                    <div class="text-center">
                        <h1>Shop</h1>
                        <span class="mdi--shopping-outline"></span>
                        <h4>Scopri i nostri prodotti</h4>
                    </div>
                </a>
            </div>

        </div>
        <div class="col-md-4 mb-4">

            <div class="home-widget">
                <a class="btn btn-vediShop" href="{{route('showContatti')}}">
                    <div class="text-center">
                        <h1>Contatti</h1>
                        <span class="typcn--contacts"></span>
                        <h4>I nostri contatti</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>


</div>

</div>


@endsection