<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'typeContact',
        'prenom',
        'nom',
        'raisonSociale',
        'ice',
        'adresse',
        'telephone',
        'mobile',
        'email',
        'typeDemande',
        'description'
    ];
}
