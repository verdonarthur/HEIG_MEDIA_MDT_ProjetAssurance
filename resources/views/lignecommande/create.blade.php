@extends('layouts.master')

@section('title', 'Nouvelle ligne de commande')

@section('navbar')
    <li><a href="{{ url('lignecommande') }}">Toutes les lignes de commande</a></li>
@endsection

@section('content-title', 'Nouvelle ligne de commande')

@section('content')
    <form action="{{ url('lignecommande') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Commande</span>
                        <div class="input-field">
                            <input type="number" min="1" step="1" name="commandeNo" id="commandeNo" required value="{{ old('commandeNo')}}">
                            <label for="commandeNo">Numéro</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Article</span>
                        <div class="row">
                            <div class="input-field col m6">
                                <input type="number" min="1" step="1" name="articleNo" id="articleNo" required value="{{ old('articleNo')}}"/>
                                <label for="articleNo">Numéro</label>
                            </div>
                            <div class="input-field col m6">
                                <input type="number" min="1" step="1" name="quantite" id="quantite" required value="{{ old('quantite')}}">
                                <label for="quantite">Quantité</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection
