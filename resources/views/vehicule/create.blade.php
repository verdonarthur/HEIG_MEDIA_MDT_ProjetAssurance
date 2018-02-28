@extends('layouts.master')

@section('title', 'Nouveau véhicule')

@section('navbar')
    <li><a href="{{ url('vehicule') }}">Tous les véhicules</a></li>
@endsection

@section('content-title', 'Nouveau véhicule')

@section('content')
    <form action="{{ url('vehicule') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Véhicule</span>
                        <div class="row">
                            <div class="input-field col s6">
                                {{-- L'attribut pattern confronte la valeur de la donnée à une expression régulière --}}
                                <input type="text" pattern="[A-Z]{3}[0-9]{6}" title="3 lettres majuscules suivies de 6 chiffres" name="noChassis" id="noChassis" required value="{{ old('noChassis') }}">
                                <label for="noChassis"><strong>N° chassis</strong> - 3 lettres et 9 chiffres, sans espace - ex: FTI000002</label>
                            </div>
                            <div class="input-field col s6">
                                <label class="active" for="anneeMC"><strong>Année MC</strong> - format : AAAA</label>
                                {{--min="1000" assure un nombre de quatre chiffres minimum, maxlength="4" assure un nombre de quatre chiffres maximum--}}
                                <input type="number" min="1000" maxlength="4" name="anneeMC" id="anneeMC" required value="{{ old('anneeMC') }}"/>
                            </div>
                            <div class="input-field col s8">
                                <input type="text" name="marque" id="marque" required value="{{ old('marque') }}">
                                <label for="marque">Marque</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" min="1" name="cylindree" id="cylindree" value="{{ old('cylindree') }}">
                                <label for="cylindree">Cylindrée (facultatif)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Client</span>
                        <div class="input-field">
                            <input type="number" min="1" step="1" name="proprietaireNo" id="proprietaireNo" required value="{{ old('proprietaireNo') }}">
                            <label for="proprietaireNo">Numéro propriétaire</label>
                        </div>
                        <div class="input-field">
                            <input type="number" min="1" step="1" name="conducteurPrincipalNo" id="conducteurPrincipalNo" required value="{{ old('conducteurPrincipalNo') }}">
                            <label for="conducteurPrincipalNo">Numéro conducteur principal</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Contrat</span>
                        <div class="input-field">
                            <input type="number" min="1" step="1" name="contratDossierNo" id="contratDossierNo" required value="{{ old('contratDossierNo') }}">
                            <label for="contratDossierNo">Numéro dossier</label>
                        </div>
                        <div class="input-field">
                            <input type="number" min="1" step="1" name="contratClientNo" id="contratClientNo" required value="{{ old('contratClientNo') }}">
                            <label for="contratClientNo">Numéro client</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection