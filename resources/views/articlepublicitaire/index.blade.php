@extends('layouts.master')

@section('title', 'Articles Publicitaires')
@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'articlepublicitaire/create', 'fab_title' => 'Nouvel article'])
@endsection

@section('content-title', 'Tous les articles')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">Numéro</th>
                    <th>Descriptif</th>
                    <th class="right-align">Prix en CHF</th>
                    <th class="right-align">Disponibilité</th>
                    {{--<th class="center-align">Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($articlepublicitaire as $key => $value)
                    <tr>
                        <td class="center-align">{{ $value->numero}}</td>
                        <td>{{ $value->descriptif}}</td>
                        <td class="right-align">{{ $value->prixUnitaire}}</td>
                        <td class="right-align">{{ $value->disponibilite}}</td>
                        <td class="center-align">
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('articlepublicitaire/'. $value->id_article .'/edit') }}"><i class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('articlepublicitaire/'. $value->id_article .'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection