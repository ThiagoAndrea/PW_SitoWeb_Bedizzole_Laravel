@extends('layouts.master')

@section('titolo_head', 'Ordine completato - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('showShop') }}">Shop</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('carrello.show') }}"> Carrello</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrello</li>

            </ol>
        </nav>
    </div>
@endsection

@section('contenuto')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <h2>Il tuo ordine è stato completato con successo.</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 text-center">
            <h5>Grazie per aver effettuato l'ordine</h5>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 text-center">
            <a href="{{ route('home') }}" class="btn btn-primary mr-3">Torna alla home</a>
            <a href="{{ route('showShop') }}" class="btn btn-primary">Vai allo shop</a>
        </div>
    </div>
</div>

@endsection
