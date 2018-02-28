@extends('layouts.master')

@section('title', 'Lignes de commande')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'lignecommande/create', 'fab_title' => 'Nouvelle ligne de commande'])
@endsection

@section('content-title', 'Toutes les lignes de commande')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>Numéro commande</th>
                    <th>Numéro article</th>
                    <th class="center-align">Quantité</th>
                    {{--<th class="center-align">Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($ligneCommande as $key => $value)
                    <tr>
                        <td>{{ $value->commandeNo}}</td>
                        <td>{{ $value->articleNo}}</td>
                        <td class="center-align">{{ $value->quantite}}</td>

                        <td class="center-align">
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('ligneCommande/'. $value->co_id.'/'. $value->a_id.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('ligneCommande/'. $value->co_id.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection