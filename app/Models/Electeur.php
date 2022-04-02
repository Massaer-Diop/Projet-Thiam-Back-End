<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_electeur',
        'prenom_electeur',
        'num_cni',
        'num_electeur',
        'adresse',
        'annee_naissance',
        'a_vote',
        'commune_id'
    ];
}
