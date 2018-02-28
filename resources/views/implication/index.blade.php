@extends('layouts.master')

@section('title', 'Implications')

@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'implication/create', 'fab_title' => 'Nouvelle implication'])
@endsection

@section('content-title', 'Toutes les implications')

@section('content')
    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>N° de chassis</th>
                    <th>Référence sinistre</th>
                    <th class="center-align">Date sinistre</th>
                    {{--<th>Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($implication as $key => $value)
                    <tr>
                        <td>{{ $value->vehiculeNoChassis}}</td>
                        <td>{{ $value->sinistreReference}}</td>
                        <td class="center-align">{{ date('d/m/Y', strtotime($value->sinistreDate))}}</td>
                        <td>
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('implication/'. $value->v_id.'/'. $value->s_id.'/'. $value->s_date.'/edit') }}"><i--}}
                            {{--class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('implication/'. $value->v_id.'/'. $value->s_id.'/'. $value->s_date.'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection