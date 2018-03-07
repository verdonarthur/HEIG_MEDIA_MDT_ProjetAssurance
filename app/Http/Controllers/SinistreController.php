<?php

namespace App\Http\Controllers;

use App\Models\Sinistre;
use Illuminate\Http\Request;

class SinistreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinistres = Sinistre::all();
        return view('sinistre/index')->with('sinistre', $sinistres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinistre/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('reference', 'date', 'montant');

        $validate = Sinistre::getValidation($inputs);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($validate->passes()) {
            return redirect('sinistre/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sinistre  $sinistre
     * @return \Illuminate\Http\Response
     */
    public function show(Sinistre $sinistre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sinistre  $sinistre
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinistre $sinistre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sinistre  $sinistre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinistre $sinistre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sinistre  $sinistre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinistre $sinistre)
    {
        //
    }
}
