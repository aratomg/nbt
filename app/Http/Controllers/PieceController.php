<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->input();
        $result = Piece::create($data);
        echo json_encode($result);
    }

}
