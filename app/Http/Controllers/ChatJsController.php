<?php

namespace App\Http\Controllers;

use App\Models\RecetesTrafic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatJsController extends Controller
{
    //

    public function recettes(){



       /*  $recettesByVois  = RecetesTrafic::query();

        $recettesByVois->whereBetween("date",[$from, $to]);
        $recettesByVois->where("site_id", "=", $site);

        $recettes =  $recettesByVois->get(['recettes_trafics.*']);

        $voies = ['VA1','VA2','VR1','VR1'];

        $montants = ['1000','500','300','500','600']; */
      /*   foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        } */

        $result = RecetesTrafic::where('site_id','=',1)->get();


        

        return response()->json($result);

    //	return view('chartjs')->with('voies',json_encode($voies,JSON_BIGINT_AS_STRING))->with('montants',json_encode($montants,JSON_NUMERIC_CHECK));

    }
}
