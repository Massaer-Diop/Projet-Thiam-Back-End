<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeCarte extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'num_cni',
        'adresse',
        'annee_naissance',
        'commune_id'
    ];
}
