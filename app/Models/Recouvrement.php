<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recouvrement extends Model
{
    use HasFactory;
    protected $table = 'recouvrement';
    protected $primaryKey = 'id_recouvrement';
    public $timestamps = false;
    protected $fillable = [
        'id_facture',
        'date_payement',
        'montant_payement',
    ];
}
