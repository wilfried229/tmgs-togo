<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\RecetesTrafic;
use App\Models\Site;
use App\Models\Voie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $sites  = Site::all();
        $voies  = Voie::all();
        $agents  = Agents::all();
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...
            $recettes = RecetesTrafic::query()->orderByDesc('id')->get();

        } else {
            # code...
            $recettes = RecetesTrafic::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();
        }
        return view('recettes.index',compact('recettes','voies','sites','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $agents  = Agents::all();
        if (Auth::user()->role  == "ADMIN") {
            # code...
            $sites  = Site::all();
            $voies  = Voie::all();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }




        return view('recettes.create',compact('sites','voies','agents'));
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
            if (Auth::user()->role  == "ADMIN") {
                $recetteTrafic->site_id = $request->site_id;

            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $recetteTrafic->site_id = $site->id;
            }


            $recetteTrafic->voie_id = $request->voie_id;
            $recetteTrafic->vacation = $request->vacation;
            $recetteTrafic->agent_voie = Agents::where('nom',$request->agent_voie)->first()->nom;
            $recetteTrafic->montant = $request->montant;
            $recetteTrafic->recette_informatiser = $request->recette_informatiser;
            if (($request->montant - $request->recette_declarer) < 0) {
                # code...
            $recetteTrafic->manquant = 0;
            $recetteTrafic->supplus =  $request->recette_declarer- $request->montant;

            } else if(($request->montant - $request->recette_declarer)>0){
                $recetteTrafic->manquant = $request->montant - $request->recette_declarer;
                $recetteTrafic->supplus = 0;

            }

            else {
                # code...
                $recetteTrafic->manquant = 0;
                $recetteTrafic->supplus = 0;

            }

            $recetteTrafic->recette_declarer = $request->recette_declarer;
            $recetteTrafic->vl = $request->vl;
            $recetteTrafic->mini_bus = $request->mini_bus;
            $recetteTrafic->autocars_camion = $request->autocars_camion;
            $recetteTrafic->pl = $request->pl;
            $recetteTrafic->nbre_exempte = $request->nbre_exempte;
            $recetteTrafic->violation = $request->violation;
            $recetteTrafic->total = ($request->vl + $request->mini_bus + $request->autocars_camion + $request->pl);
            $recetteTrafic->observation = $request->observation;


            $recetteTrafic->user_id = Auth::user()->id;
            $recetteTrafic->save();
            flashy()->success("Enregistrement effectué avec succès");

            return back();
        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
            flashy()->error("Opération non éffectuée ");
            return back();


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
            $recetteTrafic->user_id =  Auth::user()->id;
            $recetteTrafic->update();

            flashy()->success("Modification effectuée avec succès");

            return back();
        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            flashy()->error("Opération non éffectuée ");
            return back();

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

    public function payerManquant($id){

        try {

            $recetteTrafic = RecetesTrafic::find($id);
            $recetteTrafic->manquant =0;

            $recetteTrafic->update();
            flashy()->success("Payement effectuée avec succès");

            return back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            flashy()->error("Opération non éffectuée ");
            return back();
        }
    }


    public function searchRecettesByAllRequest(Request $request){

        try {

            $recettes= [];
            $sites  = Site::all();
            $voies  = Voie::all();
            if ($request->isMethod('POST')) {
                # code...
                $recetteTrafic = RecetesTrafic::query();

                $date  = $request->input('date');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');
                $vacation  = $request->input('vacation');
                $agent  = $request->input('agent');

                if ($date != null) {
                    # code...
                    $recetteTrafic->where("date", "=", $date);

                }


                if ($site != null) {
                    # code...
                    $recetteTrafic->where("site_id", "=", $site);

                }



                if ($voie != null) {
                    # code...
                    $recetteTrafic->where("voie_id", "=", $voie);

                }


                if ($vacation != null) {
                    # code...
                    $recetteTrafic->where("vacation", "=", $vacation);

                }


                if ($agent != null) {
                    # code...
                    $recetteTrafic->where("agent_voie", "=", $agent);
                }

                $recettes =  $recetteTrafic->get(['recettes_trafics.*']);

                session()->flashInput($request->all());

            }

            return view('recettes.index',compact('recettes',
            'voies',
            'sites'))->with($request->all());


        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }
    }
}
