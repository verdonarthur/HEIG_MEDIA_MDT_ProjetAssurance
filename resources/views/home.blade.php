@extends('layouts.master')

@section('title', 'Assurance')

@section('content-title')
    <h3>Bienvenue</h3>
@endsection

@section('content')
    @include('layouts.menu-panel', ['type' => 'client', 'name' => 'Clients'])
    @include('layouts.menu-panel', ['type' => 'commande', 'name' => 'Commandes'])
    @include('layouts.menu-panel', ['type' => 'lignecommande', 'name' => 'Lignes de commande'])
    @include('layouts.menu-panel', ['type' => 'articlepublicitaire', 'name' => 'Articles publicitaires'])
    @include('layouts.menu-panel', ['type' => 'vehicule', 'name' => 'Véhicules'])
    @include('layouts.menu-panel', ['type' => 'contrat', 'name' => 'Contrats'])
    @include('layouts.menu-panel', ['type' => 'habitation', 'name' => 'Habitations'])
    @include('layouts.menu-panel', ['type' => 'sinistre', 'name' => 'Sinistres'])
    @include('layouts.menu-panel', ['type' => 'couverture', 'name' => 'Couvertures'])
    @include('layouts.menu-panel', ['type' => 'implication', 'name' => 'Implications'])
@endsection