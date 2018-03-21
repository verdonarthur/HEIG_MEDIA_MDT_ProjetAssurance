<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Lib\Message;

class ContratController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contrats = Contrat::all();
        return view('contrat/index', ['contrat' => $contrats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('contrat/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $inputs = $request->only('type', 'dateDebut', 'dateEcheance','clientNo');

        // TODO : FAIRE getValidation
        $validate = Contrat::getValidation($inputs);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        try {
            Contrat::saveOne($inputs);

            Message::success('contrat.saved');
            return redirect('contrat');
        } catch (\Exception $e) {
            Message::error('bd.error', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(Contrat $contrat) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrat $contrat) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrat $contrat) {
        //
    }
}
