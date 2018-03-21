<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LigneCommande;
use App\Lib\Message;
use Illuminate\Support\Facades\Session;

class LigneCommandeCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lignes = LigneCommande::all();
        return view('lignecommande/index', ['ligneCommande' => $lignes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lignecommande/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Récupération des inputs
        $inputs = $request->only('quantite', 'commandeNo', 'articleNo');
        // Récupération de la validation
        $validate = LigneCommande::getValidation($inputs);
        // Réaction à l'échec de validation
        if ($validate->fails()) {
            // Redirection sur le formulaire avec inputs et erreurs
            return redirect()->back()->withInput()->withErrors($validate);
        }
        // Réaction au succès de la validation
        try {
            // Tentative d'enregistrement
            LigneCommande::createOne($inputs);
            // Message de succès et redirection vers la liste des lignes de commande
            Message::success('ligne.saved');
            return redirect('lignecommande');
        } catch (\Exception $e) {
            // En cas d'erreur, Message d'erreur et redirection
            Message::error('bd.error', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
