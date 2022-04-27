<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chauffeur extends Model
{
    use HasFactory, Notifiable;
    protected $table = "chauffeur";
    protected $primarykey = "id_chauffeur";
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'prenom',
        'permis',
        'date_permis',
        'tel'
    ];
}
