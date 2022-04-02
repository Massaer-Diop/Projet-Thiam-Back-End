<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeCandidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_candidat',
        'prenom_candidat',
        'parti_politique',
        'image',
        'programme',
        'num_cni_candidat',
        'commune_id'
    ];
}
