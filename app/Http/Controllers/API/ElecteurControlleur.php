<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Electeur;
use Illuminate\Http\Request;

class ElecteurControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Electeur::all();
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
        $request->validate([
            'nom_electeur' => 'required',
            'prenom_electeur' => 'required',
            'num_cni' => 'required',
            'num_electeur' => 'required',
            'adresse' => 'required',
            'annee_naissance' => 'required',
            'a_vote' => 'required',
            'commune_id' => 'required',
        ]);
        return Electeur::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Electeur::find($id);
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
        // $elec = Electeur::find($id);
        $electeur = Electeur::where('num_cni', $id)->first();
        $electeur->update($request->all());
        return $electeur;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Electeur::destroy($id);
    }

    /**
     * Search for number identity
     *
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function search($num)
    {
        return  Electeur::where('num_cni', 'like', '%'.$num.'%' )->get();
    }

    /**
     * Search for number identity
     *
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function searchByCNI($num)
    {
        return  Electeur::where('num_cni', $num)->first();
    }

    /**
     * Search for number identity
     *
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function searchByNumElecteur($num)
    {
        return  Electeur::where('num_electeur', $num)->first();
    }
    

}
