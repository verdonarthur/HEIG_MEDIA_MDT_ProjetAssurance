@extends('layouts.master')

@section('title', 'Sinistres')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'sinistre/create', 'fab_title' => 'Nouveau sinistre'])
@endsection

@section('content-title', 'Tous les sinistres')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th class="center-align">Date</th>
                    <th class="right-align">Montant</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($sinistre as $key => $value)
                    <tr>
                        <td>{{ $value->reference}}</td>
                        <td class="center-align">{{ date('d/m/Y', strtotime($value->date))}}</td>
                        <td class="right-align">{{ $value->montant}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('sinistre/'. $value->id_reference.'/'. $value->date.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('sinistre/'. $value->id_reference.'/'. $value->date.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection