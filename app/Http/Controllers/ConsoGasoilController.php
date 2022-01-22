<?php

namespace App\Http\Controllers;

use App\Models\Gasoil;
use App\Models\Voyage;
use Illuminate\Http\Request;

class ConsoGasoilController extends Controller
{
    public function index(Request $request)
    {
        $carte = Gasoil::orderBy('id_carte', 'Desc')->get();
        $defaut = $request->input('id_carte') == null ? Gasoil::max('id_carte') : $request->input('id_carte');
        $carte_gasoil = Gasoil::where('id_carte', '=', $defaut)->get();
        $voyage = Voyage::join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->
            join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')->where('voyage.id_carte', '=', $defaut)->get();
        $total_go = 0;
        $total_montant_go = 0;
        foreach ($voyage as $key ) {
            $key->total_go = $total_go += $key->gasoil_litre;
            $key->total_montant = $total_montant_go += $key->montant_gasoil;
        }
        $data = array(
                'carte' =>  $carte,
                'carte_gasoil' => $carte_gasoil,
                'voyage' => $voyage
            );
        return view('page.ConsoGasoil', $data);
    }
    public function Carte(Request $request)
    {
        $carte = Gasoil::orderBy('id_carte', 'Desc')->get();
        $defaut = $request->input('id_carte') == null ? Gasoil::max('id_carte') : $request->input('id_carte');
        $carte_gasoil = Gasoil::where('id_carte', '=', $defaut)->get();
        $voyage = Voyage::join('camion', 'camion.id_camion', '=', 'voyage.id_camion')->
            join('depense', 'depense.id_voyage', '=', 'voyage.id_voyage')->where('voyage.id_carte', '=', $defaut)->get();
        $total_go = 0;
        $total_montant_go = 0;
        foreach ($voyage as $key ) {
            $key->total_go = $total_go += $key->gasoil_litre;
            $key->total_montant = $total_montant_go += $key->montant_gasoil;
        }
        $data = array(
                'carte' =>  $carte,
                'carte_gasoil' => $carte_gasoil,
                'voyage' => $voyage
            );
        return view('page.ConsoGasoil', $data);
    }
}
