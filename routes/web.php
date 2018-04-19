<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Page d'accueil
Route::get('/', function (Request $request) {
    return view('home');
});
// Article Publicitaire
Route::resource('articlepublicitaire', 'ArticlePublicitaireCtrl');
// Sinistre
Route::resource('sinistre', 'SinistreController');
// Ligne de Commande
Route::resource('lignecommande', 'LigneCommandeCtrl');
// Contrat
Route::resource('contrat', 'ContratController');
// Commande
Route::resource('commande', 'CommandeCtrl');
// Client
Route::resource('client', 'clientController');
// Couverture
Route::resource('couverture', 'CouvertureCtrl');
// Implication
Route::resource('implication', 'ImplicationController');
