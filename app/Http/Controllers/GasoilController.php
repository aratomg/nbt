<?php

namespace App\Http\Controllers;

use App\Models\Gasoil;
use Illuminate\Http\Request;

class GasoilController extends Controller
{
    public function index()
    {
        $carte = Gasoil::all();
        $data = array(
            'carte' => $carte
        );
        return view('page.gasoil', $data);
    }
    public function add(Request $request)
    {
        $data = $request->input();
        echo json_encode(Gasoil::create($data));
    }
    public function get(Request $request)
    {
        $id = $request->input('id_carte');
        $result = Gasoil::where('id_carte', '=', $id)->get();
        echo json_encode($result);
    }
    public function list()
    {
        $carte = Gasoil::all();
        if (count($carte)>0) {
            foreach ($carte as $carte) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$carte->id_carte."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$carte->id_carte."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'libelle' => $carte->libelle,
                    'plafond' => $carte->plafond,
                    'action' => $action,
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_carte');
        $result = Gasoil::where('id_carte', '=', $id)->delete();
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        $id = $request->input('id_carte');
        $result = Gasoil::where('id_carte', '=', $id)->update($data);
        echo json_encode($result);
    }
}
