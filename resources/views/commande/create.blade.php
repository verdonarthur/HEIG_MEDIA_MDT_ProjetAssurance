@extends('layouts.master')

@section('title', 'Nouvelle commande')

@section('navbar')
    <li><a href="{{ url('commande') }}">Toutes les commandes</a></li>
@endsection

@section('content-title', "Nouvelle commande")

@section('content')
    <form action="{{ url('commande') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            {{--Client fieldset--}}
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Client</span>
                        {{--Numéro du client--}}
                        <div class="input-field">
                            {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                            <input type="number" min="1" step="1" name="clientNo" id="clientNo" required value="{{ old('clientNo')}}"/>
                            <label for="clientNo">Numéro</label>
                        </div>
                    </div>
                </div>
            </div>
            {{--Commande Fieldset--}}
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Commande</span>
                        <div class="input-field">
                            <label class="active" for="date">Date</label>
                            <input type="date" name="date" id="date" required="required" value="{{ old('date')}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title amber-text text-darken-4">Lignes de commande</span>
                        <div class="row">
                            <div class="col s3">
                                <span class="card-title amber-text text-darken-4"><span class="small">Article 1</span></span>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[0][articleNo]" id="ligne[0][articleNo]" required value="{{ old('ligne')[0]['articleNo']}}">
                                    <label for="ligne[0][articleNo]">Numéro</label>
                                </div>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[0][quantite]" id="ligne[0][quantite]" required value="{{ old('ligne')[0]['quantite']}}"/>
                                    <label for="ligne[0][quantite]">Quantité</label>
                                </div>
                            </div>
                            <div class="col s3">
                                <span class="card-title amber-text text-darken-4"><span class="small">Article 2 - <span class="small">facultatif</span></span></span>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[1][articleNo]" id="ligne[1][articleNo]" value="{{ old('ligne')[1]['articleNo']}}">
                                    <label for="ligne[1][articleNo]">Numéro</label>
                                </div>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[1][quantite]" id="ligne[1][quantite]" value="{{ old('ligne')[1]['quantite']}}"/>
                                    <label for="ligne[1][quantite]">Quantité</label>
                                </div>
                            </div>
                            <div class="col s3">
                                <span class="card-title amber-text text-darken-4"><span class="small">Article 3 - <span class="small">facultatif</span></span></span>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[2][articleNo]" id="ligne[2][articleNo]" value="{{ old('ligne')[2]['articleNo']}}">
                                    <label for="ligne[2][articleNo]">Numéro</label>
                                </div>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[2][quantite]" id="ligne[2][quantite]" value="{{ old('ligne')[2]['quantite']}}"/>
                                    <label for="ligne[2][quantite]">Quantité</label>
                                </div>
                            </div>
                            <div class="col s3">
                                <span class="card-title amber-text text-darken-4"><span class="small">Article 4 - <span class="small">facultatif</span></span></span>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[3][articleNo]" id="ligne[3][articleNo]" value="{{ old('ligne')[3]['articleNo']}}">
                                    <label for="ligne[3][articleNo]">Numéro</label>
                                </div>
                                <div class="input-field">
                                    {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                    <input type="number" min="1" step="1" name="ligne[3][quantite]" id="ligne[3][quantite]" value="{{ old('ligne')[3]['quantite']}}"/>
                                    <label for="ligne[3][quantite]">Quantité</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection