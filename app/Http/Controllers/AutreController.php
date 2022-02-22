<?php

namespace App\Http\Controllers;

use App\Models\Autre;
use Illuminate\Http\Request;

class AutreController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->input();
        $result = Autre::create($data);
        echo json_encode($result);
    }
}
