<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    protected $table = 'cheque';
    protected $primaryKey = 'id_cheque';
    public $timestamps = false;
    protected $fillable = [
        'id_recourement',
        'date_cheque',
        'numero',
        'montant'
    ];
}
