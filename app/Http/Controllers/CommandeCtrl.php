<?php

namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\LigneCommande;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;

class CommandeCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commande = Commande::all();
        return view('commande/index', ['commande' => $commande]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commande/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Récupération des inputs pertinents
        $inputs = $request->only('clientNo', 'date', 'ligne');
        
        // La méthode PHP array_filter supprime d'un tableau
        // toutes les entrées ayant une valeur "fausse"
        foreach ($inputs['ligne'] as $key => $ligne) {
            $inputs['ligne'][$key] = array_filter($ligne);
        }
        $inputs['ligne'] = array_filter($inputs['ligne']);

        // Récupération du validateur de la commande
        $validate = Commande::getValidation($inputs);
        // En cas d'échec du validateur, on redirige avec les erreurs et les inputs
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        // On fusionne les lignes de commandes qui concernent le même article
        $inputs['ligne'] = LigneCommande::mergeCommandLines($inputs['ligne']);
        // Début de la transaction
        DB::beginTransaction();
        try {
            // On tente de créer la commande et ses lignes de commande
            Commande::createOne($inputs);
            // Si pas d'erreur, on "valide" la création
            DB::commit();
            // Message de succès, puis renvoi sur la liste des commandes
            Message::success('commande.saved');
            return redirect('commande');
        } catch (\Exception $e) {
            // Si une erreur survient, on "annule" la création
            DB::rollback();
            // Message d'erreur, puis renvoi sur le formulaire avec inputs
            Message::error('bd.error', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
