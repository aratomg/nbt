<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Depenses extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'depense';
    protected $primaryKey = 'id_depense';
    public $timestamps = false;
    protected $fillable = [
        'id_voyage',
        'montant_gasoil',
        'gasoil_litre',
        'piece',
        'pneu',
        'vatsy'
    ];
}
