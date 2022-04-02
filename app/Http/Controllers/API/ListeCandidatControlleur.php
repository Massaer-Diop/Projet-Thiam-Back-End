<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ListeCandidat;
use Illuminate\Http\Request;

class ListeCandidatControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ListeCandidat::all();
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
        // $liste_candidat = new ListeCandidat();

        // if($request->hasFile('image')){
        //    $completeFileName = $request->file('image')->getClientOriginalName();
        //    $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        //    $extension = $request->file('image')->getClientOriginalExtension();
        //    $comPicture = str_replace(' ', '_', $fileNameOnly).'-'.rand() . '-'.time(). '.'. $extension;
        //    $path = $request->file('image')->storeAs('public/candidats', $comPicture);
        //    $liste_candidat->image = $comPicture;
        // }
        
        $request->validate([
            'nom_candidat' => 'required',
            'prenom_candidat' => 'required',
            'parti_politique' => 'required',
            'programme' => 'string',
            'num_cni_candidat' => 'required',
            'commune_id' => 'required',
        ]);
        return ListeCandidat::create($request->all());

    //     $liste_candidat->nom_candidat = $request->nom_candidat;
    //     $liste_candidat->prenom_candidat = $request->prenom_candidat;
    //     $liste_candidat->programme = $request->programme;
    //     $liste_candidat->num_cni_candidat = $request->num_cni_candidat;
    //     $liste_candidat->parti_politique = $request->parti_politique;
    //     $liste_candidat->commune_id = $request->commune_id;
    //     $liste_candidat->image = $comPicture;
    //    return $liste_candidat->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ListeCandidat::find($id);
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
        $cand = ListeCandidat::where('num_cni_candidat', $id)->first();
        $cand->update($request->all());
        return $cand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ListeCandidat::destroy($id);
    }

    /**
     * Search for name
     *
     * @param  string  $num
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return  ListeCandidat::where('prenom_candidat', 'like', '%'.$name.'%' )->get();
    }

    /**
     * Search for number identity
     *
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function searchByCNI($num)
    {
        return  ListeCandidat::where('num_cni_candidat', $num)->first();
    }


}
