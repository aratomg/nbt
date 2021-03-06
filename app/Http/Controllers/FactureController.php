<?php

namespace App\Http\Controllers;

use App\Models\Avoir;
use App\Models\Chek;
use App\Models\Facture;
use App\Models\Recouvrement;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use NumberFormatter;

class FactureController extends Controller
{
    public function index()
    {
        return  view('page.facture');
    }
    public function list()
    {
        setlocale(LC_ALL, 'fr_FR.utf8', 'fra');
        $voyage = Voyage::join('detail', 'detail.id_voyage', '=', 'voyage.id_voyage')
        ->leftjoin('avoir', 'voyage.id_voyage', '=', 'avoir.id_voyage')
        ->join('depense', 'depense.id_voyage','=','voyage.id_voyage')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->whereNull('avoir.id_voyage')->get();
        if (count($voyage)>0) {
            foreach ($voyage as $key ) {
                $output['data'][] = array(
                    'date_voyage' => utf8_decode(utf8_encode(strftime('%d %b %Y', strtotime($key->date_voyage)))),
                    'transit' => $key->transit,
                    'client'=> $key->client,
                    'camion' => $key->matricule,
                    'com' => $key->com,
                    'montant' => $key->montant,
                    'montant_gasoil' => $key->montant_gasoil,
                    'gasoil_litre' => $key->gasoil_litre,
                    'piece' => $key->piece,
                    'pneu' => $key->pneu,
                    'vatsy' => $key->vatsy,
                    'checkbox' => '<div class="form-check"><input class="form-check-input" type="checkbox" name="id_voyage" value="'.$key->id_voyage.'"></div>',
                    'ref_marc' => $key->ref_marc,
                    'nombre' => $key->nombre,
                    'prix_unitaire' =>$key->prix_unitaire,
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
        unset($data['voyage']);
        $voyage = $request->input('voyage');
        $facture = Facture::create($data);
        foreach ($voyage as $key) {
            $donne = array(
                'id_voyage' => $key['id_voyage'],
                'id_facture' => $facture->id_facture
            );
            $avoir = Avoir::create($donne);
            if($avoir->id_avoir){
                $voyage = Voyage::find($key['id_voyage']);
                $voyage->bl = $key['num_bl'];
                $voyage->save();
            }
        }
        echo json_encode($facture);
    }
    public function liste()
    {
        return view('page.listefac');
    }
    public function liste_facture()
    {
        setlocale(LC_ALL, 'fr_FR.utf8', 'fra');
        $facture = Facture::all();
        if (count($facture)>0) {
            foreach ($facture as $key) {
                $action = "<div class=\"btn-group\"><button type=\"button\" class=\"btn btn-success btn-flat\" onclick=\"detail('".$key->id_facture."')\">D??tails</button><button type=\"button\" class=\"btn btn-info btn-flat\" onclick=\"modif('".$key->id_facture."')\">Modifier</button><button type=\"button\" class=\"btn btn-danger btn-flat\" onclick=\"supprimer('".$key->id_facture."')\">Supprimer</button><a href='".route('print_facture', [$key->id_facture])."' target='_blank'>Imprimer</a></div>";
                $output['data'][] = array(
                    'num_fac' => $key->num_fac,
                    'date_fact' =>utf8_decode(utf8_encode(strftime('%d %b %Y', strtotime($key->date_fact)))),
                    'client' => $key->client,
                    'action' => $action,
                );
            }
        }else{
            $output['data'] = null;
        }
        echo json_encode($output);
    }
    public function get_facture(Request $request)
    {
        $id = $request->input('id_facture');
        $result = Facture::where('id_facture', '=', $id)->get();
        $avoir =  Avoir::join('voyage', 'voyage.id_voyage', '=', 'avoir.id_voyage')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')
        ->join('detail', 'detail.id_voyage', '=', 'avoir.id_voyage')
        ->where('id_facture', '=', $id)->get();
        // $chek = Chek::where('id_facture', '=', $id)->get();
        // if (count($chek) <= 0) {
        //     $chek = array();
        //     $chek[]['numero'] = null;
        // }
        $data = array(
                'avoir' => $avoir,
                'facture' => $result,
                // 'chek' => $chek
            );
        echo  json_encode($data);
    }
    public function update(Request $request)
    {
        $id =$request->input('id_facture');
        $data = $request->input();
        $voyage = $request->input('voyage');
        unset($data['voyage']);
        unset($data['_token']);
        $v = Avoir::where('id_facture', '=', $id)->get();
        $vo = array();
        foreach ($v as $key => $value) {
            array_push($vo,$value->id_voyage);
        }
        $r = array_diff($vo,$voyage);
        $s = array_diff($voyage, $vo);
        if (count($r)>0) {
            foreach ($r as $key) {
                Avoir::where('id_facture', '=', $id)->where('id_voyage', '=', $key)->delete();
            }
        }
        if (count($s)>0) {
            foreach ($s as $key) {
                $donne = array(
                    'id_voyage' => $key,
                    'id_facture' => $id
                );
                Avoir::create($donne);
            }
        }
        $rec = array(
            'montant_payement' => $request->input('total_final')
        );
        Recouvrement::where('id_facture', '=', $id)->update($rec);
        $result = Facture::where('id_facture', '=', $id)->update($data);
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_facture');
        Avoir::where('id_facture', '=', $id)->delete();
        $result = Facture::where('id_facture', '=', $id)->delete();
        Recouvrement::where('id_facture', '=', $id)->delete();
        echo json_encode($result);
    }

    public function facture($id, Request $request)
    {
        $format = NumberFormatter::create('fr_FR', NumberFormatter::SPELLOUT);
        $format->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
        $format->setAttribute(NumberFormatter::ROUNDING_MODE, NumberFormatter::ROUND_HALFUP);
        setlocale(LC_ALL, 'fr_FR.utf8', 'fra');
        $result = Facture::where('id_facture', '=', $id)->first();
        $avoir =  Avoir::join('voyage', 'voyage.id_voyage', '=', 'avoir.id_voyage')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')
        ->join('detail', 'detail.id_voyage', '=', 'avoir.id_voyage')
        ->where('id_facture', '=', $id)->get();
        $result->lettre = strtoupper($format->format($result->total_final));
        $data = array(
            'avoir' => $avoir,
            'facture' => $result,
            // 'chek' => $chek
        );
        $mpdf = new Mpdf(['orientation' => 'P', 'format' => 'A4']);
        $html = view('page.report', $data)->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
