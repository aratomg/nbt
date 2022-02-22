<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autre extends Model
{
    use HasFactory;
    protected $table = 'autre';
    protected $primaryKey = 'id_autre';
    public $timestamps = false;
    protected $fillable = [
        'date_autre',
        'designation',
        'montant'
    ];
}
