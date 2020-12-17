<?php

namespace App\Http\Controllers;

use App\Models\RecetesTrafic;
use App\Models\Site;
use App\Models\Voie;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecetteTraficController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $recettes = RecetesTrafic::query()->orderByDesc('id')->get();
        $sites  = Site::all();
        $voies  = Voie::all();
        return view('recettes.index',compact('recettes','voies','sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $sites  = Site::all();
        $voies  = Voie::all();
        return view('recettes.create',compact('sites','voies'));
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

        try {
            $recetteTrafic = new  RecetesTrafic();
            $recetteTrafic->date = $request->date;
            $recetteTrafic->voie_id = $request->voie_id;
            $recetteTrafic->site_id = $request->site_id;
            $recetteTrafic->vacation = $request->vacation;
            $recetteTrafic->agent_voie = $request->agent_voie;
            $recetteTrafic->montant = $request->montant;
            $recetteTrafic->recette_informatiser = $request->recette_informatiser;
            $recetteTrafic->recette_declarer = $request->recette_declarer;
            $recetteTrafic->manquant = $request->manquant;
            $recetteTrafic->supplus = $request->supplus;
            $recetteTrafic->vl = $request->vl;
            $recetteTrafic->mini_bus = $request->mini_bus;
            $recetteTrafic->autocars_camion = $request->autocars_camion;
            $recetteTrafic->pl = $request->pl;
            $recetteTrafic->nbre_exempte = $request->nbre_exempte;
            $recetteTrafic->violation = $request->violation;
            $recetteTrafic->total = $request->total;
            $recetteTrafic->observation = $request->observation;
            $recetteTrafic->user_id = 1;
            $recetteTrafic->save();

            return back();
        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recetteTrafic = RecetesTrafic::find($id);
        $sites  = Site::all();
        $voies  = Voie::all();
        return view('recettes.update',compact('recetteTrafic','sites','voies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $recetteTrafic = RecetesTrafic::find($id);
            $recetteTrafic->date = $request->date;
            $recetteTrafic->voie_id = $request->voie_id;
            $recetteTrafic->site_id = $request->site_id;
            $recetteTrafic->vacation = $request->vacation;
            $recetteTrafic->agent_voie = $request->agent_voie;
            $recetteTrafic->montant = $request->montant;
            $recetteTrafic->recette_informatiser = $request->recette_informatiser;
            $recetteTrafic->recette_declarer = $request->recette_declarer;
            $recetteTrafic->manquant = $request->manquant;
            $recetteTrafic->supplus = $request->supplus;
            $recetteTrafic->vl = $request->vl;
            $recetteTrafic->mini_bus = $request->mini_bus;
            $recetteTrafic->autocars_camion = $request->autocars_camion;
            $recetteTrafic->pl = $request->pl;
            $recetteTrafic->nbre_exempte = $request->nbre_exempte;
            $recetteTrafic->violation = $request->violation;
            $recetteTrafic->total = $request->total;
            $recetteTrafic->observation = $request->observation;
            $recetteTrafic->user_id = $request->user_id;
            $recetteTrafic->save();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
