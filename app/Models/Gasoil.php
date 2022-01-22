<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasoil extends Model
{
    use HasFactory;
    protected $table = 'carte_gasoil';
    protected $primaryKey = 'id_carte';
    public $timestamps = false;
    protected $fillable = [
        'libelle',
        'capacite'
    ];
}
