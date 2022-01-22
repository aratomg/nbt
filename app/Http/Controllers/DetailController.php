<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->input();
        echo json_encode(Detail::create($data));
    }
    public function update(Request $request)
    {
        $id = $request->input('id_detail');
        $data = $request->input();
        unset($data['_token']);
        $result = Detail::where('id_detail', '=', $id)->update($data);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_voyage');
        $result = Detail::where('id_voyage', '=', $id)->delete();
        echo json_encode($result);
    }
}
