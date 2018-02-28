@extends('layouts.master')

@section('title', 'Habitations')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'habitation/create', 'fab_title' => 'Nouvelle habitation'])
@endsection

@section('content-title', 'Toutes les habitations')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Adresse</th>
                    <th class="center-align">Numéro dossier</th>
                    <th class="center-align">Numéro client</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($habitation as $key => $value)
                    <tr>
                        <td>{{ $value->reference}}</td>
                        <td>{{ $value->adresse}}</td>
                        <td class="center-align">{{ $value->contratDossierNo}}</td>
                        <td class="center-align">{{ $value->contratClientNo}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('habitation/'.$value->id_reference.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('habitation/'.$value->id_reference.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection