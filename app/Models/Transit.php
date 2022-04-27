<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    use HasFactory;
    protected $table ="transit";
    protected $primairykey = 'id_transit';
    public $timestamps = false;
    protected $fillable = [
        'transit',
        'client',
        'nif',
        'stat'
    ];
}
