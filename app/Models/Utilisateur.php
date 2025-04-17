<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'role'];

    protected $hidden = ['password'];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
