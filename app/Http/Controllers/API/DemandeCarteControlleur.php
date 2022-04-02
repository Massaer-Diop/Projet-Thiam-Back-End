<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DemandeCarte;
use Illuminate\Http\Request;

class DemandeCarteControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeCarte::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donnnes = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'num_cni' => 'required',
            'adresse' => 'required',
            'annee_naissance' => 'required',
            'commune_id' => 'required',
        ]);
        $demandeCarte = DemandeCarte::create([
            'nom' => $donnnes['nom'],
            'prenom' => $donnnes['prenom'],
            'num_cni' => $donnnes['num_cni'],
            'adresse' => $donnnes['adresse'],
            'annee_naissance' => $donnnes['annee_naissance'],
            'commune_id' => $donnnes['commune_id'],
        ]);
        return response()->json([
            'demande_carte'=>$demandeCarte
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DemandeCarte::find($id);
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
        $elec = DemandeCarte::find($id);
        $elec->update($request->all());
        return $elec;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DemandeCarte::destroy($id);
    }

    /**
     * Search for number identity
     *
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function searchByCNI($num)
    {
        return  DemandeCarte::where('num_cni', $num)->first();
    }
}
