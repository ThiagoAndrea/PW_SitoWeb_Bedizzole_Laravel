@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')


@section('contenuto')
<div class="container">
    <div class="container-notizie-home">
        <div class="row d-flex">
            <div class="col-md-12 text-center intestazione-notizie">
            <h1><a href="{{(route('notizie.index'))}}" class="anchor-ultime-notizie">Ultime notizie <span class="ic--round-greater-than"></span></a></h1>
            </div>
            <div class="row d-flex">
                <div class="col-md-9 notizia-principale">
                    <a href="{{route('notizia.show', ['id_notizia'=>$notizie[0]->id_notizia]) }}">
                    <h4 class="text-center">{{$notizie[0]->titolo}}</h4>
                    <img src="{{asset('img/notizie/' . $notizie[0]->foto)}}" class="img-fluid img-notizie" alt>
                    </a>
                </div>
                <div class="col-md-3 full-height">
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia'=>$notizie[1]->id_notizia]) }}">
                        <h5 class="text-center">{{$notizie[1]->titolo}}</h5>
                        </a>
                    </div>
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia'=>$notizie[2]->id_notizia]) }}">
                        <h5 class="text-center">{{$notizie[2]->titolo}}</h5>
                        </a>
                    </div>
                    <div class="row">
                        <a href="{{route('notizia.show', ['id_notizia'=>$notizie[3]->id_notizia]) }}">
                        <h5 class="text-center">{{$notizie[3]->titolo}}</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 container-notize-home">
                <h2>Prossime partite</h2>
        </div>
        <div class="col-md-4">
            <div class="container-notize-home">
                <h2>Shop</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="container-notize-home">
                <h2>Contatti</h2>
            </div>
        </div>
    </div>
</div>


@endsection