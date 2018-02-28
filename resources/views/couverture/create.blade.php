@extends('layouts.master')

@section('title', 'Nouvelle couverture')

@section('navbar')
    <li><a href="{{ url('couverture') }}">Afficher toutes les couvertures</a></li>
@endsection

@section('content-title', 'Nouvelle couverture')

@section('content')
    <form action="{{ url('couverture') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Contrat</span>
                        <div class="row">
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <input type="number" min="1" step="1" name="contratDossierNo" id="contratDossierNo" required value="{{ old('contratDossierNo') }}"/>
                                <label for="contratDossierNo">Numéro dossier</label>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <input type="number" min="1" step="1" name="contratClientNo" id="contratClientNo" required value="{{ old('contratClientNo') }}"/>
                                <label for="contratClientNo">Numéro client</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Sinistre</span>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" name="sinistreReference" id="sinistreReference" required value="{{ old('sinistreReference') }}"/>
                                <label for="sinistreReference">Référence</label>
                            </div>
                            <div class="input-field col s6">
                                <label class="active" for="sinistreDate">Date</label>
                                <input type="date" name="sinistreDate" id="sinistreDate" required value="{{ old('sinistreDate') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection