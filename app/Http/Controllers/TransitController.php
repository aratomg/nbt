<?php

namespace App\Http\Controllers;

use App\Models\Transit;
use Illuminate\Http\Request;

class TransitController extends Controller
{
    public function index()
    {
        return view('page.transit');
    }
    public function liste()
    {
        $transit = Transit::all();
        if(count($transit)>0){
            foreach ($transit as $key) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$key->id_transit."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$key->id_transit."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'transit' => $key->transit,
                    'client'=> $key->client,
                    'nif' => $key->nif,
                    'stat' => $key->stat,
                    'action' => $action
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function add(Request $request)
    {
        $data = $request->input();
        $result = Transit::create($data);
        echo json_encode($result);
    }
    public function get(Request $request)
    {
        $id = $request->input('id_transit');
        $result = Transit::where('id_transit', '=', $id)->get();
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        $data  = $request->input();
        unset($data['_token']);
        $id = $request->input('id_transit');
        $result = Transit::where('id_transit', '=', $id)->update($data);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_transit');
        $result = Transit::where('id_transit', '=', $id)->delete();
        echo json_encode($result);
    }
}
