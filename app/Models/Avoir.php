<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avoir extends Model
{
    use HasFactory;
    protected $table ='avoir';
    public $timestamps = false;
    protected $primaryKey = 'id_avoir';
    protected $fillable = [
        'id_facture',
        'id_voyage',
    ];
}
