@extends('layouts.master')

@section('title', 'Couvertures')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'couverture/create', 'fab_title' => 'Nouvelle couverture'])
@endsection

@section('content-title', 'Toutes les couvertures')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">Numéro dossier</th>
                    <th class="center-align">Numéro client</th>
                    <th class="center-align">Référence sinistre</th>
                    <th class="center-align">Date sinistre</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($couverture as $key => $value)
                    <tr>
                        <td class="center-align">{{ $value->contratDossierNo}}</td>
                        <td class="center-align">{{ $value->contratClientNo}}</td>
                        <td class="center-align">{{ $value->sinistreReference}}</td>
                        <td class="center-align">{{ date('d/m/Y', strtotime($value->sinistreDate))}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('couverture'.$value->c_id.'/'. $value->c_clientID.'/'.$value->s_id.'/'. $value->s_date.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('couverture'.$value->c_id.'/'. $value->c_clientID.'/'.$value->s_id.'/'. $value->s_date.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection