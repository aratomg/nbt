<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $table = "chauffeur";
    protected $primarykey = "id_chauffeur";
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cin',
        'tel'
    ];
}
