<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Camion extends Model
{
    use HasFactory, Notifiable;
    protected $table = "camion";
    protected $primarykey = "id_camion";
    public $timestamps = false;
    protected $fillable = [
        'matricule',
        'marque',
        'genre',
        'modele',
        'norme',
        'type'
    ];
}
