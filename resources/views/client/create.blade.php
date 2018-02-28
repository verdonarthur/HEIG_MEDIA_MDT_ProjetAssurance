@extends('layouts.master')

@section('title', 'Nouveau client')

@section('navbar')
    <li><a href="{{ url('client') }}">Tous les clients</a></li>
@endsection

@section('content-title', 'Nouveau client')

@section('content')
    <form action="{{ url('client') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            {{--Client fieldset--}}
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Client</span>
                        <div class="row">
                            {{--Nom du client--}}
                            <div class="input-field col s4">
                                {{--Aucune restriction nécessaire--}}
                                <input type="text" name="nom" id="nom" required="required" value="{{ old('nom')}}"/>
                                <label for="nom">Nom</label>
                            </div>
                            {{--Adresse du client --}}
                            <div class="input-field col s8">
                                {{--Aucune restriction nécessaire--}}
                                <input type="text" name="adresse" id="adresse" required="required" value="{{ old('adresse')}}"/>
                                <label for="adresse">Adresse</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--Contrat fieldset--}}
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Contrats</span>

                        {{-- Premier contrat --}}
                        <div class="row">
                            <span class="col s12 card-title amber-text text-darken-4"><span class="small">Contrat 1<span class="small"> - obligatoire</span></span></span>

                            {{--Type du contrat --}}
                            <div class="input-field col m4">
                                {{--TODO : Trouver un moyen de setter la valeur du select--}}
                                <select class="browser-default" id="contrat[0][type]" name="contrat[0][type]" required>
                                    <option value="" disabled selected>Type de contrat</option>
                                    <option value="RC" {{ old('contrat')[0]['type'] === 'RC' ? 'selected' : null }}>RC</option>
                                    <option value="RC + Casco" {{ old('contrat')[0]['type'] === 'RC + Casco' ? 'selected' : null }}>RC + Casco</option>
                                    <option value="RC ménage maison" {{ old('contrat')[0]['type'] === 'RC ménage maison' ? 'selected' : null }}>RC ménage maison</option>
                                    <option value="RC ménage appartement" {{ old('contrat')[0]['type'] === 'RC ménage appartement' ? 'selected' : null }}>RC ménage appartement
                                    </option>
                                </select>
                            </div>
                            {{--Date de création du contrat --}}
                            <div class="input-field col m4">
                                <label class="active" for="contrat[0][dateDebut]">Date de début</label>
                                <input type="date" name="contrat[0][dateDebut]" id="contrat[0][dateDebut]" required value="{{ old('contrat')[0]['dateDebut']}}"/>
                            </div>
                            {{--Date d'échéance du contrat--}}
                            <div class="input-field col m4">
                                <label class="active" for="contrat[0][dateEcheance]">Date d'échéance</label>
                                <input type="date" name="contrat[0][dateEcheance]" id="contrat[0][dateEcheance]" required value="{{ old('contrat')[0]['dateEcheance']}}"/>
                            </div>
                        </div>

                        {{--Deuxième contrat --}}
                        <div class="row">
                            <span class="col s12 card-title amber-text text-darken-4"><span class="small">Contrat 2<span class="small"> - facultatif</span></span></span>

                            {{--Type du contrat --}}
                            <div class="input-field col m4">
                                {{--TODO : Trouver un moyen de setter la valeur du select--}}
                                <select class="browser-default" id="contrat[1][type]" name="contrat[1][type]">
                                    <option value="" selected>Type de contrat</option>
                                    @if (old('contrat') && array_key_exists('type', old('contrat')[1]))
                                        <option value="RC" {{ old('contrat')[1]['type'] === 'RC' ? 'selected' : null }}>RC</option>
                                        <option value="RC + Casco" {{ old('contrat')[1]['type'] === 'RC + Casco' ? 'selected' : null }}>RC + Casco</option>
                                        <option value="RC ménage maison" {{ old('contrat')[1]['type'] === 'RC ménage maison' ? 'selected' : null }}>RC ménage maison</option>
                                        <option value="RC ménage appartement" {{ old('contrat')[1]['type'] === 'RC ménage appartement' ? 'selected' : null }}>RC ménage
                                            appartement
                                        </option>
                                    @else
                                        <option value="RC">RC</option>
                                        <option value="RC + Casco">RC + Casco</option>
                                        <option value="RC ménage maison">RC ménage maison</option>
                                        <option value="RC ménage appartement">RC ménage appartement</option>
                                    @endif
                                </select>
                            </div>
                            {{--Date de création du contrat--}}
                            <div class="input-field col m4">
                                <label class="active" for="contrat[1][dateDebut]">Date de début</label>
                                <input type="date" name="contrat[1][dateDebut]" id="contrat[1][dateDebut]" value="{{ old('contrat')[1]['dateDebut']}}"/>
                            </div>
                            {{--Date d'échéance du contrat--}}
                            <div class="input-field col m4">
                                <label class="active" for="contrat[1][dateEcheance]">Date d'échéance</label>
                                <input type="date" name="contrat[1][dateEcheance]" id="contrat[1][dateEcheance]" value="{{ old('contrat')[1]['dateEcheance']}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn amber darken-4 waves-effect waves-light">Mémoriser</button>
    </form>
@endsection