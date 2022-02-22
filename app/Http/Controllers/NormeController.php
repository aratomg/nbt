<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use App\Models\Facture;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormeController extends Controller
{
    public function index(Request $request)
    {
        $annee = $request->input('annee') == null ? Carbon::parse(Voyage::max('date_voyage'))->format('y') : $request->input('annee');
        $mois = $request->input('mois') == null ? Carbon::parse(Voyage::max('date_voyage'))->format('m') : $request->input('mois');
        $liste_annee = Db::table('voyage')->select(DB::raw('DISTINCT YEAR(date_voyage) as annee'))->get();
        $camion = Voyage::join('camion', 'voyage.id_camion', '=', 'camion.id_camion')->join('detail', 'detail.id_voyage', '=', 'voyage.id_voyage')->whereBetween('date_voyage', [$annee.'-'.$mois.'-01', $annee.'-'.$mois.'-31'])->distinct()->get('camion.id_camion');
        foreach ($camion as $key) {
            $v = Camion::where('id_camion', '=', $key->id_camion)->get('matricule');
            $key->matricule = $v[0]->matricule;
            $key->voyage = Voyage::join('camion', 'voyage.id_camion', '=', 'camion.id_camion')->join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')->join('detail', 'detail.id_voyage', '=', 'voyage.id_voyage')->where('camion.id_camion', '=', $key->id_camion)->whereBetween('date_voyage', [$annee.'-'.$mois.'-01', $annee.'-'.$mois.'-31'])->get();
        }
        $data = array(
            'camion' => $camion,
            'annee' => $liste_annee,
            'mois' => $mois,
            'anne' => $annee
        );
        return view('page.norme', $data);
    }
    public function mois(Request $request)
    {
        $annee = $request->input('annee');

        // $mois = DB::select('SELECT DISTINCT  MONTH(date_voyage) FROM `voyage` WHERE date_voyage BETWEEN "'.$annee.'-01-01" AND "'.$annee.'-12-31"');
        // $mois = Db::table('voyage')->select(DB::raw('DISTINCT MONTH(date_voyage) as mois'))->whereBetween('date_voyage', [$annee.'-01-01', $annee.'-12-31'])->get();
        $mois = Voyage::whereBetween('date_voyage', [$annee.'-01-01', $annee.'-12-31'])->distinct()->get([DB::raw('MONTH(date_voyage) as mois')]);
        $array = array();
        foreach($mois as $key){
            array_push($array,$key->mois);
        }
        echo json_encode($mois);
    }
}
