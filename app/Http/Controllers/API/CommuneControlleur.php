<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneControlleur extends Controller
{
    public function getAllCommune(){
        return Commune::orderBy('nom_commune', 'asc')->get();
    }
}
