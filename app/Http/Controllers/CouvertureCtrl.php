<?php

namespace App\Http\Controllers;

use App\Lib\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Couverture;

class CouvertureCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couvertures = Couverture::all();
        return view('couverture/index', ['couverture' => $couvertures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('couverture/create');
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
        $inputs = $request->only('contratDossierNo', 'contratClientNo', 'sinistreReference', 'sinistreDate');

        // Récupération du validateur de Couverture
        $validate = Couverture::getValidation($inputs);

        // En cas d'échec de la validation
        if ($validate->fails()) {
            // Redirection vers le formulaire, avec inputs et erreurs
            return redirect()->back()->withInput()->withErrors($validate);
        }
        // En cas de succès de la validation
        try {
            // Tentative de création de la couverture
            Couverture::createOne($inputs);
            // Envoi du message et redirection vers la liste des couvertures
            Message::success('couverture.saved');
            return redirect('couverture');
        } catch (\Exception $e) {
            // En cas d'erreur lors du processus
            // Envoi du message d'erreur
            Message::error('bd.error', ['error' => $e->getMessage()]);
            // Redirection vers le formulaire, avec inputs
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
