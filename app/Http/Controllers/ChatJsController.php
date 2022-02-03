<?php

namespace App\Http\Controllers;

use App\Models\PointPassage;
use App\Models\RecetesTrafic;
use App\Models\Site;
use App\Models\Voie;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatJsController extends Controller
{
    //

    public function statistiquePassageGate(){


        $sites = Site::all();
        return view('statistique-passage-Gate',compact('sites'));

    }

    public function passageGate(Request $request){
        $voies = Voie::where('site_id',$request->site_id)->get();

        $dateTime = new DateTime($request->month);
        $month = $dateTime->format('m');
        $year =$dateTime->format('Y');
        $start_date = "01-".$request->month."-".$year;
        $start_time = strtotime($start_date);
        $end_time = strtotime("+1 month", $start_time);
        $sommeGate = [];
        for($i=$start_time; $i<$end_time; $i+=86400)
        {
           ///dd($start_time);
            $list[] = date('d', $i);
            $numnber = date('d', $i);
            $tes  = "$year-$month-$numnber";
                    $date=date_create($tes);
           // dd($tes);
            $datSearch = date_format($date,"Y-m-d");
            ////$list[]= date_format($date,"Y-m-d");
           //$list[] = date('d-m-Y','01-12-2020');


           $gate = PointPassage::whereDate('date', $datSearch)
           ->where('site_id',"=",$request->site_id)
           ->select('somme_total_recette_equialente','site_id')->sum('somme_total_recette_equialente');

           //dd($gate);

/*
           $gate = PointPassage::whereDate('date', date('Y-m-d', $year."-".$month.'-'.$i))
          // ->whereMonth('date','=',$month)
           //->whereYear('date','=',$year)
           ->where('site_id',"=",$request->site_id)
           ->select('somme_total_recette_equialente','site_id')->sum('somme_total_recette_equialente'); */
           array_push($sommeGate,$gate);
        }

        //dd($sommeGate);
        $site = Site::where('id',$request->site_id)->first();
        $periode  = $request->month;
        //return view('index');
        return view('chatj-passage-gate',compact('site','periode'))
        ->with('list',json_encode($list,JSON_NUMERIC_CHECK))
        ->with('sommeGate',json_encode($sommeGate,JSON_NUMERIC_CHECK));


    }
    public function statistiqueRecette(){


        $sites = Site::all();
        return view('statistique-recette',compact('sites'));

    }

    public function statistiqueTrafics(){

        $sites = Site::all();
        return view('statistique-trafics',compact('sites'));
    }

    public function trafics(Request $request){

     //   $daysOfMonth;


        $dateTime = new DateTime($request->month);
        $month = $dateTime->format('m');
        $year =$dateTime->format('y');
        $start_date = "01-".$request->month."-".$year;
        $start_time = strtotime($start_date);
        $end_time = strtotime("+1 month", $start_time);
        $traficsMonth = [];
        for($i=$start_time; $i<$end_time; $i+=86400)
        {
           $list[] = date('d', $i);
           $numnber = date('d', $i);
           $tes  = "$year-$month-$numnber";
                   $date=date_create($tes);
          // dd($tes);
           $datSearch = date_format($date,"Y-m-d");
           ////$list[]= date_format($date,"Y-m-d");
           $Trafics = RecetesTrafic::whereDate('date',$datSearch)
           ->select('total','site_id')->sum('total');
           array_push($traficsMonth,$Trafics);
        }

        //dd($traficsMonth);
        $site = Site::where('id',$request->site_id)->first();
        $periode  = $request->month;
        //return view('index');
        return view('chatj-trafics',compact('site','periode'))
        ->with('list',json_encode($list,JSON_NUMERIC_CHECK))
        ->with('traficsMonth',json_encode($traficsMonth,JSON_NUMERIC_CHECK));


    }
    public function recettes(Request $request){

        $voies = Voie::where('site_id',$request->site_id)->get();

        $dateTime = new DateTime($request->month);


        if ($dateTime->format('l') == "Sunday") {
            $dateTime  = $dateTime->modify('+1 day');
        }

        //dd($dateTime->format('l'));
        $mondayWeek1 = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
        $sundayWeek1 = clone $dateTime->modify('Sunday this week');


        $recetesVoiesWeek1  =  [];
        foreach ($voies as $key => $value) {

            $recetesVoie = RecetesTrafic::where('voie_id',$value->id)->whereBetween('date', [$mondayWeek1,$sundayWeek1])
            ->select('recette_informatiser','voie_id','site_id')->sum('recette_informatiser');
            array_push($recetesVoiesWeek1,$recetesVoie);
        }




        $finWeek1 = $sundayWeek1->modify("+1 day")->format('Y-m-d');
        $dateTime2 = new DateTime($finWeek1);


        $mondayWeek2 = clone $dateTime2->modify(('Sunday' == $dateTime2->format('l')) ? 'Monday last week' : 'Monday this week');
        $sundayWeek2 = clone $dateTime2->modify('Sunday this week');
    //   dd($sundayWeek2);

    $recetesVoiesWeek2  =  [];
    foreach ($voies as $key => $value) {

        $recetesVoie = RecetesTrafic::where('voie_id',$value->id)->whereBetween('date', [$mondayWeek2,$sundayWeek2])
        ->select('recette_informatiser','voie_id','site_id')->sum('recette_informatiser');
        array_push($recetesVoiesWeek2,$recetesVoie);
    }


        $dateTime3 = new DateTime($sundayWeek2->modify("+1 day")->format('Y-m-d'));

        $mondayWeek3 = clone $dateTime3->modify(('Sunday' == $dateTime3->format('l')) ? 'Monday last week' : 'Monday this week');
        $sundayWeek3 = clone $dateTime3->modify('Sunday this week');

        $recetesVoiesWeek3  =  [];
        foreach ($voies as $key => $value) {
            $recetesVoie = RecetesTrafic::where('voie_id',$value->id)->whereBetween('date', [$mondayWeek3,$sundayWeek3])
            ->select('recette_informatiser','voie_id','site_id')->sum('recette_informatiser');
            array_push($recetesVoiesWeek3,$recetesVoie);
        }

        //  dd($recetesVoiesWeek2,$recetesVoiesWeek3);
        $dateTime4 = new DateTime($sundayWeek3->modify("+1 day")->format('Y-m-d'));

        $mondayWeek4 = clone $dateTime4->modify(('Sunday' == $dateTime4->format('l')) ? 'Monday last week' : 'Monday this week');
        $sundayWeek4 = clone $dateTime4->modify('Sunday this week');

        $recetesVoiesWeek4  =  [];
        foreach ($voies as $key => $value) {

            $recetesVoie = RecetesTrafic::where('voie_id',$value->id)->whereBetween('date', [$mondayWeek4,$sundayWeek4])
            ->select('recette_informatiser','voie_id','site_id')->sum('recette_informatiser');
            array_push($recetesVoiesWeek4,$recetesVoie);
        }





        $voieSites = [];
        foreach ($voies as $key => $value) {
            # code...
            array_push($voieSites,$value['libelle']);
        }


        $site = Site::where('id',$request->site_id)->first();
        $periode  = $request->month;
        //return view('index');
        return view('chatj',compact('site','periode'))->with('voieSites',json_encode($voieSites,JSON_BIGINT_AS_STRING))
        ->with('recetesVoiesWeek1',json_encode($recetesVoiesWeek1,JSON_NUMERIC_CHECK))
        ->with('recetesVoiesWeek2',json_encode($recetesVoiesWeek2,JSON_NUMERIC_CHECK))
        ->with('recetesVoiesWeek3',json_encode($recetesVoiesWeek3,JSON_NUMERIC_CHECK))
        ->with('recetesVoiesWeek4',json_encode($recetesVoiesWeek4,JSON_NUMERIC_CHECK));


    	//return view('chatjs')->with('voies',json_encode($voies,JSON_BIGINT_AS_STRING))->with('montants',json_encode($montants,JSON_NUMERIC_CHECK));

    }
}
