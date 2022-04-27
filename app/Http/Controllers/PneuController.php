<?php

namespace App\Http\Controllers;

use App\Models\Pneu;
use Illuminate\Http\Request;

class PneuController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->input();
        $result = Pneu::create($data);
        echo json_encode($result);
    }

}
