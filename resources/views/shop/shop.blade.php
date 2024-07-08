@php
    use App\Models\DataLayer;
    $dl = new DataLayer();
@endphp

@extends('layouts.master')

@section('title', 'Shop - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Shop</h1>
        </header>
    </div>
@endsection


@section('contenuto')

<div class="container">
    <div class="container container-ricerca">
        <div class="row justify-content-end">
            <div class="col-md-3">
                <input type="text" id="searchInput_shop" class="form-control" placeholder="Cerca...">
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">

            @foreach ($prodotti as $prodotto)
                <div class="col-lg-4 col-sm-6 col-12 selettore-ricerca">
                    <div class="prodotto-shop">
                        <div class="immagineProdotto">
                            <img src="{{ asset('img/shop/' . $prodotto->foto) }}" class="img-fluid">
                        </div>
                        <div class="descrizioneProdotto">
                            <h3>{{ $prodotto->descrizione }}</h3>
                            <h4>{{ number_format($prodotto->prezzo, 2, ',', '.') }}€</h4>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="taglia" class="form-label">Taglia:</label>
                                <select class="form-select" id="taglia">
                                    <option selected>Scegli...</option>
                                    @php
                                        $taglie = $prodotto->taglie;
                                    @endphp
                                    @foreach ($taglie as $taglia)
                                        <option value="{{ $taglia->id_taglia }}">{{ $taglia->taglia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="quantita" class="form-label">Quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita" value="1"
                                    min="1">
                            </div>
                        </div>
                        <div class="row col-6 mx-auto">
                            <button class="btn btn-success">
                                <iconify-icon icon="solar:cart-plus-outline"></iconify-icon> Aggiungi al carrello
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>
@endsection
