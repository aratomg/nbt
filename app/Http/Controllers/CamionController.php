<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use App\Notifications\Historique;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index()
    {
        return view('page.camion');
    }
    public function add(Request $request)
    {
        $data = $request->input();
        $result = Camion::create($data);
        echo json_encode($result);
    }
    public function get(Request $request)
    {
        $id = $request->input('id_camion');
        $result = Camion::where('id_camion', '=', $id)->get();
        echo json_encode($result);
    }
    public function list_camion()
    {
        $camion = Camion::all();
        if (count($camion)>0) {
            foreach ($camion as $camion) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$camion->id_camion."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$camion->id_camion."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'matricule' => $camion->matricule,
                    'marque' => $camion->marque,
                    'genre' => $camion->genre,
                    'modele' => $camion->modele,
                    'norme' => $camion->norme,
                    'action' => $action
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_camion');
        $result = Camion::where('id_camion', '=', $id)->delete();
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        $id = $request->input('id_camion');
        $result = Camion::where('id_camion', '=', $id)->update($data);
        echo json_encode($result);
    }
}
