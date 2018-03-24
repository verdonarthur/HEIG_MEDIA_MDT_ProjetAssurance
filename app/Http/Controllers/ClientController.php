<?php

namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Contrat;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('client/index', ['client' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('nom', 'adresse', 'contrat');
        
        foreach ($inputs['contrat'] as $key => $ligne) {
            $inputs['contrat'][$key] = array_filter($ligne);
        }
        
        $inputs['contrat'] = array_filter($inputs['contrat']);

        $validate = Client::getValidation($inputs);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
       
        $inputs['contrat'] =Contrat::mergeContrat($inputs['contrat']);

        DB::beginTransaction();
        try {
            Client::saveOne($inputs);

            DB::commit();
            Message::success('client.saved');
            return redirect('client');
        } catch (\Exception $e) {
            DB::rollback();
            Message::error('bd.error', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
