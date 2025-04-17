<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'lue',
        'utilisateur_id',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function scopeUnread($query)
    {
        return $query->where('lue', false);
    }
    public function scopeRead($query)
    {
        return $query->where('lue', true);
    }
    public function markAsRead()
    {
        $this->lue = true;
        $this->save();
    }
    public function markAsUnread()
    {
        $this->lue = false;
        $this->save();
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
    public function getLueAttribute($value)
    {
        return $value ? 'Lu' : 'Non lu';
    }
    public function getMessageAttribute($value)
    {
        return $value ? $value : 'Aucun message';
    }
}
