@extends('layouts.master')

@section('title', 'Nouvel article')

@section('navbar')
    <li><a href="{{ url('articlepublicitaire') }}">Tous les articles publicitaires</a></li>
@endsection

@section('content-title', 'Nouvel article')

@section('content')
    <form action="{{ url('articlepublicitaire') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            {{--ID de l'article--}}
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <input type="number" min="1" step="1" required name="numero" id="numero" value="{{ old('numero') }}"/>
                                <label for="numero">Numéro</label>
                            </div>
                            {{--Prix en CHF de l'article--}}
                            <div class="input-field col s6">
                                {{--min="0" assure ne valide que des nombres positifs--}}
                                <input type="number" min="0" step="0.01" name="prixUnitaire" id="prixUnitaire" required value="{{ old('prixUnitaire') }}"/>
                                <label for="prixUnitaire">Prix en CHF</label>
                            </div>
                            {{--Description de l'article--}}
                            <div class="input-field col s12">
                                {{--Aucune restriction à faire pour ce champ--}}
                                <input type="text" name="descriptif" id="descriptif" required value="{{ old('descriptif') }}"/>
                                <label for="descriptif">Descriptif</label>
                            </div>
                            {{--Choix de la disponibilité de l'article--}}
                            <div class="col s6">
                                {{--TODO : trouver un meilleur système...--}}
                                Article disponible ?
                                @if(old('disponibilite') === "Non")
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-oui" value="Oui"/>
                                        <label for="dispo-oui">Oui</label>
                                    </p>
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-non" value="Non" checked/>
                                        <label for="dispo-non">Non</label>
                                    </p>
                                @else
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-oui" value="Oui" checked/>
                                        <label for="dispo-oui">Oui</label>
                                    </p>
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-non" value="Non"/>
                                        <label for="dispo-non">Non</label>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection