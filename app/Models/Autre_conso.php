<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autre_conso extends Model
{
    use HasFactory;
    protected $table = 'autre_conso';
    protected $primaryKey = 'id_conso';
    public $timestamps = false;
    protected $fillable = [
        'date_conso',
        'designation',
        'prix_gasoil',
        'gasoil_litre',
        'id_carte'
    ];
}
