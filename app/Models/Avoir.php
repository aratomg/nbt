<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Avoir extends Model
{
    use HasFactory, Notifiable;
    protected $table ='avoir';
    public $timestamps = false;
    protected $primaryKey = 'id_avoir';
    protected $fillable = [
        'id_facture',
        'id_voyage',
    ];
}
