<?php

namespace App\Http\Controllers;

use App\Models\Depenses;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->input();
        echo json_encode(Depenses::create($data));
    }
    public function update(Request $request)
    {
        $id = $request->input('id_depense');
        $data = $request->input();
        unset($data['_token']);
        $result = Depenses::where('id_depense', '=', $id)->update($data);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_voyage');
        $result = Depenses::where('id_voyage','=', $id )->delete();
        echo json_encode($result);
    }

}
