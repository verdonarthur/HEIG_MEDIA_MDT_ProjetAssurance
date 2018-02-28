@extends('layouts.master')

@section('title', 'Commandes')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'commande/create', 'fab_title' => 'Nouvelle commande'])
@endsection

@section('content-title', 'Toutes les commandes')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">Numéro</th>
                    <th>Date</th>
                    <th class="center-align">Numéro client</th>
                    {{--<th class="center-align">Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($commande as $key => $value)
                    <tr>
                        <td class="center-align">{{ $value->numero}}</td>
                        <td>{{ date('d/m/Y', strtotime($value->date))}}</td>
                        <td class="center-align">{{ $value->clientNo}}</td>
                        <td class="center-align">
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('commande/'. $value->id_commande .'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('commande/'. $value->id_commande .'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection