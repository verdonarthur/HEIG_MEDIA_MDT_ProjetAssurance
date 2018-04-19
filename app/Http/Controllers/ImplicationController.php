<?php

namespace App\Http\Controllers;

use App\Models\Implication;
use Illuminate\Http\Request;
use App\Lib\Message;

class ImplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $implications = Implication::all();
        return view('implication/index', ['implication' => $implications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('implication/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $inputs = $request->only('vehiculeNoChassis', 'sinistreReference', 'sinistreDate');
        
        $validate = Implication::getValidation($inputs);

        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
    
        try {
            Implication::saveOne($inputs);
            Message::success('implication.saved');
            return redirect('implication');
        } catch (\Exception $e) {
            Message::error('bd.error', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Implication  $implication
     * @return \Illuminate\Http\Response
     */
    public function show(Implication $implication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Implication  $implication
     * @return \Illuminate\Http\Response
     */
    public function edit(Implication $implication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Implication  $implication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Implication $implication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Implication  $implication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Implication $implication)
    {
        //
    }
}
