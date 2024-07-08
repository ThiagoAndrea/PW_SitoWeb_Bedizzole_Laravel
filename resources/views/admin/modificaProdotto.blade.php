@extends('layouts.master')

@section('title', 'Admin - Modifica prodotto - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('prodotti.index')}}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('prodotti.index')}}"> Gestione Shop</a></li>
            @if (@isset($prodotto->id_prodotto))
                <li class="breadcrumb-item active" aria-current="page">Modifica prodotto</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">Aggiungi prodotto</li>
            @endif
        </ol>
    </nav>
</div>
@endsection


@section('contenuto')
<div class="row justify-content-center">
    <div class="col-md-6 container-aggiungiGiocatore">
        <h5 class="text-center">
            @if (isset($prodotto->id_prodotto))
                Modifica il prodotto
            @else
                Aggiungi un nuovo prodotto
            @endif
        </h5>
        @if(isset($prodotto->id_prodotto))
            <form method="post" action="{{route('prodotti.update', ['prodotti' => $prodotto->id_prodotto])}}"
                enctype="multipart/form-data">
            @method('PUT')
        @else
            <form method="post" action="{{route('prodotti.store')}}" enctype="multipart/form-data">
        @endif
            @csrf
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="descrizione" class="form-label">Descrizione:</label>
                        <input type="text" class="form-control" id="descrizione" name="descrizione"
                            value="{{ isset($prodotto->descrizione) ? $prodotto->descrizione : '' }}" required>
                            <span id="descrizione-invalida" class="error-span"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="prezzo" class="form-label">Prezzo:</label>
                        <input type="text" class="form-control" id="prezzo" name="prezzo"
                            value="{{ isset($prodotto->prezzo) ? $prodotto->prezzo : '' }}" required>
                            <span id="prezzo-invalido" class="error-span"></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="taglie" class="form-label">Taglie disponibili:</label>
                <div class="row">
                    @foreach($taglie as $taglia)
                        <div class="col-md-4">
                            <div class="form-check">
                                @if(isset($prodotto) && $prodotto->taglie->contains('id_taglia', $taglia->id_taglia))
                                    <input class="form-check-input" type="checkbox" name="taglie[]"
                                        id="taglia{{ $taglia->id_taglia }}" value="{{ $taglia->id_taglia }}" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="taglie[]"
                                        id="taglia{{ $taglia->id_taglia }}" value="{{ $taglia->id_taglia }}">
                                @endif
                                <label class="form-check-label" for="taglia{{ $taglia->id_taglia }}">
                                    {{ $taglia->taglia }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <span id="taglie-invalide" class="error-span"></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto prodotto:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                @if (isset($prodotto) && $prodotto->foto)
                    <p> Immagine attuale: {{ $prodotto->foto }}</p>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                @if(isset($prodotto->id_prodotto) && $prodotto != null)
                    <input type="hidden" name="id" value="{{$prodotto->id_prodotto}}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                    <button type="submit" class="btn btn-success" onclick="event.preventDefault(); checkProdotto()">Salva</button>

                @else
                    <button type="button" class="btn btn-secondary">Annulla</button>
                    <button type="submit" class="btn btn-success" onclick="event.preventDefault(); checkProdotto()">Aggiungi</button>
                @endif
            </div>
        </form>
    </div>
</div>
</div>

@endsection