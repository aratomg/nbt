<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Recouvrement;
use Illuminate\Http\Request;

class RecouvrementController extends Controller
{
    public function index()
    {
        return view('page.recouvrement');
    }
    public function add(Request $request)
    {
        $data = $request->input();
        echo json_encode(Recouvrement::create($data));
    }
    public function list()
    {
        $recouvre = Facture::leftjoin('recouvrement', 'recouvrement.id_facture', '=', 'facture.id_facture')->select('facture.id_facture','facture.type' ,'facture.client', 'facture.date_echeance', 'facture.total_final','facture.num_fac')->whereNull('recouvrement.date_payement')->get();
        if (count($recouvre)>0) {
            foreach ($recouvre as $key) {
                $action = "<button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$key->id_facture."')\">Recouvrir</button>";
                $output['data'][] = array(
                    'num_fac' => $key->num_fac,
                    'type' => $key->type.' '.$key->client,
                    'date' => $key->date_echeance,
                    'montant' => $key->total_final,
                    'date1' => $key->date_payement,
                    'montant1' => $key->montant_payement,
                    'action' => ($key->montant_payement == null ? $action : '')
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function index_list()
    {
        return view('page.liste_recouvrement');
    }
    public function liste_rec()
    {
        $recouvre = Facture::leftjoin('recouvrement', 'recouvrement.id_facture', '=', 'facture.id_facture')->whereNotNull('date_payement')->get();
        if (count($recouvre)>0) {
            foreach ($recouvre as $key) {
                $output['data'][] = array(
                    'num_fac' => $key->num_fac,
                    'type' => $key->type.' '.$key->client,
                    'date' => $key->date_echeance,
                    'montant' => $key->total_final,
                    'date1' => $key->date_payement,
                    'montant1' => $key->montant_payement,
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }

}
