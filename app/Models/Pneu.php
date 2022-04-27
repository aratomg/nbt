<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pneu extends Model
{
    use HasFactory;
    protected $table = "pneu";
    protected $primairyKey = "id_table";
    public $timestamps = false;
    protected $fillable = [
        'designation',
        'date_pneu',
        'prix',
    ];
}
