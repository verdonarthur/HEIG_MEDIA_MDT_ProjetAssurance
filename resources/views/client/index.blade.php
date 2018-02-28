@extends('layouts.master')

@section('title', 'Clients')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'client/create', 'fab_title' => 'Nouveau client'])
@endsection

@section('content-title', 'Tous les clients')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">Numéro</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    {{--<th class="center-align">Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($client as $key => $value)
                    <tr>
                        <td class="center-align">{{ $value->numero }}</td>
                        <td>{{ $value->nom }}</td>
                        <td>{{ $value->adresse }}</td>
                        <td class="center-align">
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('client/'. $value->id_client .'/edit') }}"><i class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('client/'. $value->id_client .'/destroy') }}"><i class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection