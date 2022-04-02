<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VotersControlleur extends Controller
{
    /**
     * Search for number identity
     *
     * @param  int  $nom
     * @return \Illuminate\Http\Response
     */
    public function CountByCandidat()
    {
        $resultat = DB::table('votes')
            ->join('liste_candidats', 'votes.liste_candidat_id', '=', 'liste_candidats.id')
            ->select(DB::raw('count(*) as nombre_fois'))
            ->groupBy('liste_candidats.commune_id')
            ->get();
        return response()->json($resultat, 200);
    }

    public function AllCandidatByCommune()
    {
        $resultat = DB::table('votes')
            ->join('liste_candidats', 'votes.liste_candidat_id', '=', 'liste_candidats.id')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->select('communes.nom_commune as Nom_Commune' ,DB::raw('count(*) as Total_votant_commune'))
            ->groupBy('communes.nom_commune')
            ->get();
        return response()->json($resultat, 200);
    }

    public function AllCandidatByRegion()
    {
        $resultat = DB::table('votes')
            ->join('liste_candidats', 'votes.liste_candidat_id', '=', 'liste_candidats.id')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->join('arrondissements', 'communes.arrondissement_id', '=', 'arrondissements.id')
            ->join('departements', 'arrondissements.departement_id', '=', 'departements.id')
            ->join('regions', 'departements.region_id', '=', 'regions.id')
            ->select('regions.nom_region as Nom_Region' ,DB::raw('count(*) as Total_Votant_Region'))
            ->groupBy('regions.nom_region')
            ->get();
        return response()->json($resultat, 200);
    }

    /**
     * Search for number identity
     *
     * @param  string  $nom
     * @return \Illuminate\Http\Response
     */
    public function CandidatByRegion($nom)
    {
        $resultat = DB::table('votes')
            ->join('liste_candidats', 'votes.liste_candidat_id', '=', 'liste_candidats.id')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->join('arrondissements', 'communes.arrondissement_id', '=', 'arrondissements.id')
            ->join('departements', 'arrondissements.departement_id', '=', 'departements.id')
            ->join('regions', 'departements.region_id', '=', 'regions.id')
            ->select('liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat', 'communes.nom_commune' ,DB::raw('count(*) as Total_point'))
            ->orderBy('communes.nom_commune', 'asc' )
            ->groupBy('liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat', 'communes.nom_commune')
            ->where('regions.nom_region', $nom)
            ->get();
        return response()->json($resultat, 200);
    }

    /**
     * Search for number identity
     *
     * @param  string  $nom
     * @return \Illuminate\Http\Response
     */
    public function CandidatByCommune($nom)
    {
        $resultat = DB::table('votes')
            ->join('liste_candidats', 'votes.liste_candidat_id', '=', 'liste_candidats.id')
            ->join('communes', 'liste_candidats.commune_id', '=', 'communes.id')
            ->select('liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat' ,DB::raw('count(*) as Total_point'))
            ->orderBy('liste_candidats.prenom_candidat', 'asc' )
            ->groupBy('liste_candidats.nom_candidat', 'liste_candidats.prenom_candidat')
            ->where('communes.nom_commune', $nom)
            ->get();
        return response()->json($resultat, 200);
    }

}
