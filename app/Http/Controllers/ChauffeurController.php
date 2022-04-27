<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function index()
    {
        return view('page.chauffeur');
    }
    public function add_chauffeur(Request $request)
    {
        $data = $request->input();
        echo json_encode(Chauffeur::create($data));
    }

    public function get(Request $request)
    {
        $id = $request->input('id_chauffeur');
        $result = Chauffeur::where('id_chauffeur', $id)->get();
        echo json_encode($result);

    }
    public function list_chauffeur()
    {
        $chauffeur = Chauffeur::all();
        if(count($chauffeur)>0){
            foreach ($chauffeur as $chauffeur) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$chauffeur->id_chauffeur."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$chauffeur->id_chauffeur."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'nom' => $chauffeur->nom,
                    'prenom' => $chauffeur->prenom,
                    'permis' => $chauffeur->permis,
                    'date_permis' => $chauffeur->date_permis,
                    'tel' => $chauffeur->tel,
                    'action' => $action
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function delete(Request $request){
        $id = $request->input('id_chauffeur');
        $result = Chauffeur::where('id_chauffeur',$id)->delete();
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        $id = $request->input('id_chauffeur');
        $result = Chauffeur::where('id_chauffeur', $id)->update($data);
        echo json_encode($result);
    }
}
