<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Page d'accueil
Route::get('/', function (Request $request) {
    return view('home');
});
// Article Publicitaire
Route::resource('articlepublicitaire', 'ArticlePublicitaireCtrl');

Route::resource('sinistre', 'SinistreController');
