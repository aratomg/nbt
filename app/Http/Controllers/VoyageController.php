<?php

namespace App\Http\Controllers;

use App\Exports\ExportVoyage;
use App\Imports\VoyageImport;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Gasoil;
use App\Models\Piece;
use App\Models\Pneu;
use App\Models\Transit;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VoyageController extends Controller
{
    public function index()
    {
        $transit = Transit::all();
        $carte = Gasoil::all();
        $camion = Camion::all();
        $chauffeur = Chauffeur::all();
        $piece = Piece::all();
        $pneu = Pneu::all();
        $data = array(
            'chauffeur' => $chauffeur,
            'camion' => $camion,
            'carte' => $carte,
            'transit' => $transit,
            'pneu' => $pneu,
            'piece' => $piece
        );
        return view('page.voyage', $data);
    }
    public function add(Request $request)
    {
        $data = $request->input();
        echo json_encode(Voyage::create($data));
    }
    public function list()
    {
        $voyage = Voyage::join('depense', 'depense.id_voyage','=','voyage.id_voyage')->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->get();
        if (count($voyage)>0) {
            foreach ($voyage as $key ) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$key->id_voyage."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$key->id_voyage."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'date_voyage' => $key->date_voyage,
                    'transit' => $key->transit,
                    // 'client'=> $key->client,
                    'camion' => $key->matricule,
                    'com' => $key->com,
                    'montant' => $key->montant,
                    'montant_gasoil' => $key->montant_gasoil,
                    'gasoil_litre' => $key->gasoil_litre,
                    'piece' => $key->piece,
                    'pneu' => $key->pneu,
                    'vatsy' => $key->vatsy,
                    'action' => $action
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function get(Request $request)
    {
        $id = $request->input('id_voyage');
        $voyage = Voyage::join('detail', 'detail.id_voyage', '=', 'voyage.id_voyage')->join('depense', 'depense.id_voyage','=','voyage.id_voyage')->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->where('voyage.id_voyage','=', $id)->get();
        echo json_encode($voyage);
    }
    public function update(Request $request)
    {
        $id = $request->input('id_voyage');
        $data = $request->input();
        unset($data['_token']);
        $result = Voyage::where('id_voyage', '=', $id)->update($data);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_voyage');
        $result = Voyage::where('id_voyage', '=', $id)->delete();
        echo json_encode($result);
    }
    public function import(Request $request){
        Excel::import(new VoyageImport, $request->file('file')->store('files'));
        return redirect()->back();
    }
    public function exportVoyage(Request $request){
        return Excel::download(new ExportVoyage, 'Voyage.xlsx');
    }

}
