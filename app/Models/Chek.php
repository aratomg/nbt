<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chek extends Model
{
    use HasFactory;
    protected $table = 'chek';
    protected $primaryKey = 'id_cheque';
    public $timestamps = false;
    protected $fillable = [
        'numero' ,
        'date_chek',
        'montant_chek',
        'id_facture'
    ];
}
