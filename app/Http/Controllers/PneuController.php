<?php

namespace App\Http\Controllers;

use App\Models\Pneu;
use Illuminate\Http\Request;

class PneuController extends Controller
{
    public function index()
    {
        return view('page.pneu');
    }

    public function add(Request $request)
    {
        $data = $request->input();
        $result = Pneu::create($data);
        echo json_encode($result);
    }

    public function get(Request $request)
    {
        $id = $request->input('id_pneu');
        $result = Pneu::where('id_pneu', $id)->get();
        echo json_encode($result);
    }
    public function list()
    {
        $pneu =  Pneu::all();
        if (count($pneu)) {
            foreach ($pneu as $key ) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$key->id_pneu."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$key->id_pneu."')\">Supprimer</button></div>";
                $output['data'][] = array(
                    'numero' => $key->numero,
                    'reference' => $key->reference,
                    'marque' => $key->marque,
                    'prix' => $key->prix,
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
        $id = $request->input('id_pneu');
        $result = Pneu::where('id_pneu', $id)->delete();
        echo json_encode($id);
    }
    public function update(Request $request)
    {
        $data = $request->input();
        unset($data['_token']);
        $id = $request->input('id_pneu');
        $result = Pneu::where('id_pneu', $id)->update($data);
        echo json_encode($result);
    }
}
