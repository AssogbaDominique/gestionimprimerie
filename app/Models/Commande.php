<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'quantite',
        'montant_total',
        'utilisateur_id',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function impressions()
    {
        return $this->hasMany(Impression::class);
    }
}
