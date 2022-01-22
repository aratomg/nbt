<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'facture';
    protected $primaryKey = 'id_facture';
    public $timestamps = false;
    protected $fillable = [
        'num_fac',
        'client',
        'type',
        'nif',
        'stat',
        'voyage',
        'total',
        'tva',
        'total_final',
        'date_echeance',
        'date_fact'
    ];
}
