<?php

namespace App\Http\Controllers;

use App\Models\Chek;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChekController extends Controller
{
    public function index()
    {
        $anne = Carbon::parse(Voyage::max('date_voyage'))->format('Y');
        $data = array(
            'anne' => $anne
        );
        return view('page.chek', $data);
    }
    public function liste()
    {
        setlocale(LC_ALL, 'fr_FR.utf8', 'fra');
        $chek = Chek::orderBy('date_chek', 'Desc')->get();
        if(count($chek)>0){
            foreach ($chek as $key) {
                $output['data'][] = array(
                    'numero' => $key->numero,
                    'designation' => $key->designation,
                    'date' => utf8_decode(utf8_encode(strftime('%d %b %Y', strtotime($key->date_chek)))),
                    'montant' => $key->montant_chek
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
        $result = Chek::create($data);
        echo json_encode($result);
    }
    public function update(Request $request)
    {
        $id = $request->input('id_facture');
        $chek = Chek::where('id_facture', '=', $id)->get();
        if (count($chek)> 0) {
            $data = $request->input();
            $result = Chek::where('id_facture', '=', $id)->update($data);
        }else{
            $data = $request->input();
            $result = Chek::create($data);
        }
        echo json_encode($result);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id_facture');
        $result = Chek::where('id_facture', '=', $id)->delete();
        echo json_encode($result);
    }
}
