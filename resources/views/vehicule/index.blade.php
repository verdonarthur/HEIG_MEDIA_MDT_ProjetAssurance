@extends('layouts.master')

@section('title', 'Véhicules')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'vehicule/create', 'fab_title' => 'Nouveau véhicule'])
@endsection

@section('content-title', 'Tous les véhicules')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>N° de chassis</th>
                    <th class="center-align">Numéro propriétaire</th>
                    <th class="center-align">Numéro conducteur principal</th>
                    <th>Marque</th>
                    <th class="center-align">Année MC</th>
                    <th class="center-align">Cylindrée</th>
                    <th class="center-align">Numéro dossier</th>
                    <th class="center-align">Numéro client</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($vehicule as $key => $value)
                    <tr>
                        <td>{{ $value->noChassis}}</td>
                        <td class="center-align">{{ $value->proprietaireNo}}</td>
                        <td class="center-align">{{ $value->conducteurPrincipalNo}}</td>
                        <td>{{ $value->marque}}</td>
                        <td class="center-align">{{ $value->anneeMC}}</td>
                        <td class="center-align">{{ $value->cylindree}}</td>
                        <td class="center-align">{{ $value->contratDossierNo}}</td>
                        <td class="center-align">{{ $value->contratClientNo}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('vehicule/'. $value->id_chassis.'/edit') }}"><i class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('vehicule/'. $value->id_chassis.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection