<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Impression extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'type',
        'prix_unitaire',
        'date',
        'commande_id',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
