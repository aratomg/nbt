<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;
    protected $fillable = [
        'id_voyage',
        'tonnage_aller',
        'retour',
        'tonnage_retour',
        'norme',
        'ref_marc',
        'prix_unitaire',
        'nombre'
    ];
}
