<?php

namespace App\Http\Controllers;

use App\Models\Autre;
use App\Models\Chek;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

class JournalController extends Controller
{
    public function index()
    {
        $anne = Carbon::parse(Voyage::max('date_voyage'))->format('Y');
        $liste_annee = DB::table('voyage')->select(DB::raw('DISTINCT YEAR(date_voyage) as annee'))->get();
        $data = array(
            'anne' => $anne,
            'annee' => $liste_annee
        );
        return view('page.journal', $data);
    }
    public function liste(Request $request)
    {
        $annee = $request->input('annee') == null ? Carbon::parse(Voyage::max('date_voyage'))->format('y') : $request->input('annee');
        $voyage = Voyage::join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')
        ->join('chauffeur', 'chauffeur.id_chauffeur', '=', 'voyage.id_chauffeur')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->whereBetween('date_voyage', [$annee.'-1-01', $annee.'-12-31'])->get();
        $voyage1 = Voyage::join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')
        ->join('chauffeur', 'chauffeur.id_chauffeur', '=', 'voyage.id_chauffeur')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->whereNotNull('pneu')->whereBetween('date_voyage', [$annee.'-1-01', $annee.'-12-31'])->get();
        $voyage2 = Voyage::join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')
        ->join('chauffeur', 'chauffeur.id_chauffeur', '=', 'voyage.id_chauffeur')
        ->join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->whereNotNull('piece')->whereBetween('date_voyage', [$annee.'-1-01', $annee.'-12-31'])->get();
        $chek = Chek::all();
        $autre = Autre::whereBetween('date_autre', [$annee.'-1-01', $annee.'-12-31'])->get();
        foreach ($voyage as $key) {
            $journal['data'][] = array(
                'date' => $key->date_voyage,
                'designation' => 'vatsy '.$key->nom,
                'camion' => $key->vatsy,
            );
        }
        foreach ($voyage2 as $key) {
            $journal['data'][] = array(
                'date' => $key->date_voyage,
                'designation' => 'Piece Camion '.$key->matricule,
                'camion' => $key->piece
            );
        }
        foreach ($voyage1 as $key) {
            $journal['data'][] = array(
                'date' => $key->date_voyage,
                'designation' => 'Pneu',
                'camion' => $key->pneu
            );
        }
        foreach ($chek as $key) {
            $journal['data'][] = array(
                'date' => $key->date_chek,
                'designation' => 'Chek',
                'chek' => $key->montant_chek,
            );
        }
        foreach ($autre as $key) {
            $journal['data'][] = array(
                'date' => $key->date_autre,
                'designation' => $key->designation,
                'autre' => $key->montant,
            );
        }
        // foreach ($journal as $key => $row) {
        //     $count[$key] = $row['date'];
        // }
        // array_multisort($count, SORT_DESC, $journal);
        // echo json_encode($journal['data']);
        $array = $journal['data'];
        foreach ($array as $key => $row) {
            $date[$key] = $row['date'];
        }
        array_multisort($date, SORT_ASC, $array);
        $j['data']=$array;
        echo json_encode($j);
    }
}
