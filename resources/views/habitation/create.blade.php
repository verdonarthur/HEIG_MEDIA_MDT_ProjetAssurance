@extends('layouts.master')

@section('title', 'Nouvelle habitation')

@section('navbar')
    <li><a href="{{ url('habitation') }}">Toutes les habitations</a></li>
@endsection

@section('content-title', 'Nouvelle habitation')

@section('content')
    <form action="{{ url('habitation') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Habitation</span>
                        <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="reference" id="reference" required value="{{ old('reference')}}">
                                <label for="reference">Référence</label>
                            </div>
                            <div class="input-field col s8">
                                <input type="text" name="adresse" id="adresse" required value="{{ old('adresse')}}">
                                <label for="adresse">Adresse</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Contrat</span>
                        <div class="row">
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <input type="number" min="1" step="1" name="contratDossierNo" id="contratDossierNo" required value="{{ old('contratDossierNo')}}">
                                <label for="contratDossierNo">Numéro dossier</label>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <input type="number" min="1" step="1" name="contratClientNo" id="contratClientNo" required value="{{ old('contratClientNo')}}">
                                <label for="contratClientNo">Numéro client</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection