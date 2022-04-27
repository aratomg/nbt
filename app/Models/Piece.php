<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $table ="piece";
    protected $primaryKey = "id_piece";
    public $timestamps = false;
    protected $fillable = [
        "date_piece",
        "designation",
        "prix"
    ];
}
