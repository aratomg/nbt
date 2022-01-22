<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    protected $table = 'voyage';
    protected $primaryKey = 'id_voyage';
    public $timestamps = false;
    protected $fillable = [
        'date_voyage',
        'transit',
        // 'client',
        'id_camion',
        'id_chauffeur',
        'com',
        'montant',
        'id_carte'
    ];
}
