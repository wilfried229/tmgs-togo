<?php

namespace App\Http\Controllers;

use App\Models\PassageUhf;
use App\Models\PointPassage;
use App\Models\PointPassageMaunel;
use App\Models\PointRecapPayement;
use App\Models\Site;
use App\Models\Voie;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PointRecapPayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $passageGate  = PointPassage::query()->select('somme_total_trafic','somme_total_recette_equialente','date as dateGate')->get();

        $passageUhf  = PassageUhf::query()->select('somme_total_trafic as trafis_uhf','somme_total_recette_equialente as recette_uhf','date as dateUhf')->get();

        $passageManuel  = PointPassageMaunel::query()->select('etaFinal_taficInformatiser','etaFinal_recetteInformatiser','date as dateManuel')->get();

        $passageGateAll =[];
        foreach ($passageGate as $key => $gate) {

            array_push($passageGateAll,$gate);
        }

        $passageUhfAll =[];
        foreach ($passageUhf as $key => $uhf) {
            array_push($passageUhfAll,$uhf);
        }

        $passageManuelAll =[];
        foreach ($passageManuel as $key => $manuel) {
            array_push($passageManuelAll,$manuel);
        }

        function array_interlace() {
            $args = func_get_args();
            $total = count($args);

            if($total < 2) {
                return FALSE;
            }

            $i = 0;
            $j = 0;
            $arr = array();

            foreach($args as $arg) {
                foreach($arg as $v) {
                    $arr[$j] = $v;
                    $j += $total;
                }

                $i++;
                $j = $i;
            }

            ksort($arr);
            return array_values($arr);
        }
  //  dd($passageUhfAll);
        $fusions  = array_interlace($passageManuelAll,$passageUhfAll,$passageGateAll);
        //dd($fusions);
        $sites  = Site::all();
        $voies  = Voie::all();
        return view('recap.index',compact('fusions','voies','sites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function show(PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function edit(PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointRecapPayement $pointRecapPayement)
    {
        //
    }
}
