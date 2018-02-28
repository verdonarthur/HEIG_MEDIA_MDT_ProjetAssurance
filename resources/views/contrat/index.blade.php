@extends('layouts.master')

@section('title', 'Contrats')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'contrat/create', 'fab_title' => 'Nouveau contrat'])
@endsection

@section('content-title', 'Tous les contrats')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">Numéro dossier</th>
                    <th class="center-align">Numéro client</th>
                    <th>Type</th>
                    <th class="center-align">Date début</th>
                    <th class="center-align">Date échéance</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($contrat as $key => $value)
                    <tr>
                        <td class="center-align">{{$value->dossierNo}}</td>
                        <td class="center-align">{{$value->clientNo}}</td>
                        <td>{{$value->type}}</td>
                        <td class="center-align">{{date('d/m/Y', strtotime($value->dateDebut))}}</td>
                        <td class="center-align">{{date('d/m/Y', strtotime($value->dateEcheance))}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('contrat/'.$value->id_contrat.'/'.$value->c_id.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('contrat/'.$value->id_contrat.'/'.$value->c_id.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection