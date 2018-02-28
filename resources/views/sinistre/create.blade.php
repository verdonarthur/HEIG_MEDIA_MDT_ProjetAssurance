@extends('layouts.master')

@section('title', 'Nouveau sinistre')

@section('navbar')
    <li><a href="{{ url('sinistre') }}">Afficher tous les sinistres </a></li>
@endsection

@section('content-title', 'Nouveau sinistre')

@section('content')
    <form action="{{ url('sinistre') }}" method="post" class="col s12">
        {{csrf_field()}}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s4">
                                <input type="text" name="reference" pattern="[A-Z]{3}[0-9]+" title="Trois lettres majuscules suivies d'un ou plusieurs chiffres." id="reference" required value="{{ old('reference')}}">
                                <label for="reference">Référence <span class="small">Ex de valeurs : SIN1, ABC352, III001</span></label>
                            </div>
                            <div class="input-field col s4">
                                <label class="active" for="date">Date</label>
                                <input type="date" name="date" id="date" required value="{{ old('date')}}">
                            </div>
                            <div class="input-field col s4">
                                <input type="number" min="1" step="0.01" name="montant" id="montant" required value="{{ old('montant')}}">
                                <label for="montant">Montant</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection