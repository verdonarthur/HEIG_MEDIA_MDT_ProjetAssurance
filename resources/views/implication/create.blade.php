@extends('layouts.master')

@section('title', 'Nouvelle implication')

@section('navbar')
    <li xmlns="http://www.w3.org/1999/html"><a href="{{ url('implication') }}">Afficher toutes les implications</a></li>
@endsection

@section('content-title', 'Nouvelle implication')

@section('content')
    <form action="{{ url('implication') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            {{--Véhicule--}}
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Véhicule</span>
                        <div class="input-field">
                            {{-- L'attribut pattern confronte la valeur de la donnée à une expression régulière --}}
                            <input type="text" pattern="[A-Z]{3}[0-9]{6}" title="3 lettres majuscules suivies de 6 chiffres" name="vehiculeNoChassis" id="vehiculeNoChassis" required
                                   value="{{ old('vehiculeNoChassis')}}">
                            <label for="vehiculeNoChassis">N° de chassis</label>
                        </div>
                    </div>
                </div>
            </div>
            {{--Sinistre--}}
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Sinistre</span>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" name="sinistreReference" id="sinistreReference" required value="{{ old('sinistreReference')}}"/>
                                <label for="sinistreReference">Référence</label>
                            </div>
                            <div class="input-field col s6">
                                <label for="sinistreDate" class="active">Date</label>
                                <input type="date" name="sinistreDate" id="sinistreDate" required value="{{ old('sinistreDate')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection