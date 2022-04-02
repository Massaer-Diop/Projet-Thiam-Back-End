<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Electeur;
use Illuminate\Http\Request;

class ElecteursControlleur extends Controller
{
    /**
     * Search for number identity
     *
     * @param  int  $nom
     * @return \Illuminate\Http\Response
     */
    public function FindCommuneEtRegionElecteur($nom)
    {
        $resultat = DB::table('electeurs')
            ->join('communes', 'electeurs.commune_id', '=', 'communes.id')
            ->join('arrondissements', 'communes.arrondissement_id', '=', 'arrondissements.id')
            ->join('departements', 'arrondissements.departement_id', '=', 'departements.id')
            ->join('regions', 'departements.region_id', '=', 'regions.id')
            ->select('electeurs.id','electeurs.nom_electeur', 'electeurs.prenom_electeur', 'electeurs.num_cni','electeurs.a_vote','communes.nom_commune', 'regions.nom_region')
            ->where('electeurs.num_cni', $nom)->first();
        return response()->json($resultat, 200);

    //    return $users = DB::table('users')->count();
    }
}
