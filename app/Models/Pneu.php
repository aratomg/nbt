<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pneu extends Model
{
    use HasFactory;
    protected $table = "pneu";
    protected $primairyKey = "id_pneu";
    public $timestamps = false;
    protected $fillable = [
        'numero',
        'reference',
        'marque',
        'prix',
        'date'
    ];
}
