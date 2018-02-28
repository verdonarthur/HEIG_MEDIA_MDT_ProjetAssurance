@extends('layouts.master')

@section('title', 'Nouveau contrat')

@section('navbar')
    <li><a href="{{ url('contrat') }}">Afficher tous les contrats</a></li>
@endsection

@section('content-title', 'Nouveau contrat')

@section('content')
    <form action="{{ url('contrat') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Client</span>
                        <div class="input-field">
                            {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                            <input type="number" min="1" step="1" name="clientNo" id="clientNo" required min="1" value="{{ old('clientNo')}}">
                            <label for="clientNo">Numéro</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s9">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Contrat</span>
                        <div class="row">
                            {{--Type du contrat --}}
                            <div class="input-field col m4">
                                {{--TODO : Trouver un moyen de setter la valeur du select--}}
                                <select class="browser-default" id="type" name="type" required>
                                    <option value="" disabled selected>Type de contrat</option>
                                    <option value="RC" {{ old('type') === 'RC' ? 'selected' : null }}>RC</option>
                                    <option value="RC + Casco" {{ old('type') === 'RC + Casco' ? 'selected' : null }}>RC + Casco</option>
                                    <option value="RC ménage maison" {{ old('type') === 'RC ménage maison' ? 'selected' : null }}>RC ménage maison</option>
                                    <option value="RC ménage appartement" {{ old('type') === 'RC ménage appartement' ? 'selected' : null }}>RC ménage appartement</option>
                                </select>
                            </div>
                            {{--Date de création du contrat --}}
                            <div class="input-field col m4">
                                <label class="active" for="dateDebut">Date de début</label>
                                {{--min="{{date('Y-m-d')}}" assure que la date rentrée soit supérieure à la date du jour--}}
                                <input type="date" name="dateDebut" min="{{date('Y-m-d')}}" id="dateDebut" required="required" value="{{ old('dateDebut')}}"/>
                            </div>
                            {{--Date d'échéance du contrat--}}
                            <div class="input-field col m4">
                                <label class="active" for="dateEcheance">Date d'échéance</label>
                                {{--min="{{date('Y-m-d')}}" assure que la date rentrée soit supérieure à la date du jour--}}
                                <input type="date" name="dateEcheance" min="{{date('Y-m-d')}}" id="dateEcheance" required="required"
                                       value="{{ old('dateEcheance')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection