<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CandidatsControlleurs extends Controller
{

    /**
     * Search for number identity
     *
     * @param  string  $nom
     * @return \Illuminate\Http\Response
     */
    public function findAllCandidatByCommune($nom)
    {
        $resultat = DB::table('liste_candidats')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->join('arrondissements', 'communes.arrondissement_id', '=', 'arrondissements.id')
            ->join('departements', 'arrondissements.departement_id', '=', 'departements.id')
            ->join('regions', 'departements.region_id', '=', 'regions.id')
            ->select('liste_candidats.id','liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat', 'liste_candidats.num_cni_candidat', 'liste_candidats.image', 'liste_candidats.parti_politique')
            ->where('communes.nom_commune', $nom)->get();
        return response()->json($resultat, 200);
    }

    public function findAllCandidat()
    {
        $resultat = DB::table('liste_candidats')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->select('liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat', 'liste_candidats.image', 'liste_candidats.parti_politique', 'liste_candidats.programme', 'communes.nom_commune')
            ->get();
        return response()->json($resultat, 200);
    }
}
