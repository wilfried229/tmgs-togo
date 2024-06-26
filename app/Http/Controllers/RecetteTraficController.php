<?php

namespace App\Http\Controllers;

use App\Exports\RecettesExport;
use App\Imports\RecettesImport;
use App\Models\Agents;
use App\Models\RecetesTrafic;
use App\Models\Site;
use App\Models\Voie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class RecetteTraficController extends Controller
{


      /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportExport()
    {
        return view('file-import-all');
    }

    /**
     * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new RecettesImport(), $request->file('file_recettes')->store('temp'));

            flashy()->success("Recettes importés avec succès");

            return back();
        }

    /**
     * @return \Illuminate\Support\Collection
     */    public function fileExport()
    {
        return Excel::download(new RecettesExport(), 'recettes.xlsx');
    }

    public function recettesbySite($site){

        session()->get('site');
        session()->put('site', $site);
        $site = Site::where('libelle',$site)->first();
        $agents  = Agents::where('site_id',$site->id)->get();
        $voies  = Voie::where('site_id',$site->id)->get();

        $recettes = RecetesTrafic::query()->where('site_id',$site->id)->orderByDesc('id')->get();

        return view('recettes.index',compact('recettes','voies','agents'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function site()
    {

        session()->forget(['site']);
        $sites = Site::all();
        return view('recettes.site',compact('sites'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...

            $site = Site::where('libelle',session('site'))->first();
            $sites = Site::where('libelle',session('site'))->get();

                $agents  = Agents::where('site_id',$site->id)->get();
                $voies  = Voie::where('site_id',$site->id)->get();

        $recettes = RecetesTrafic::query()->where('site_id',$site->id)->orderByDesc('id')->get();

        } else {
            # code...


            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();
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


        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...

            $site = Site::where('libelle',session('site'))->first();
            $sites = Site::where('libelle',session('site'))->get();

                $agents  = Agents::where('site_id',$site->id)->get();
                $voies  = Voie::where('site_id',$site->id)->get();
        } else {
            # code...
           $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();
            $site = Site::where('id',Auth::user()->site_id)->first();

        }




        return view('recettes.create',compact('sites','site','voies','agents'));
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
            if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
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
            $recetteTrafic->tricycle = $request->tricycle;
            $recetteTrafic->roues2 = $request->roues2;

            $recetteTrafic->pl_2essieux = $request->pl_2essieux;
            $recetteTrafic->pl_3essieux = $request->pl_3essieux;
            $recetteTrafic->pl_4essieux = $request->pl_4essieux;
            $recetteTrafic->pl_5essieux = $request->pl_5essieux;
            $recetteTrafic->pl_6essieux = $request->pl_6essieux;
            $recetteTrafic->pl_7essieux = $request->pl_7essieux;
            $recetteTrafic->pl_8essieux = $request->pl_8essieux;
            $recetteTrafic->pl_9essieux = $request->pl_9essieux;

            $recetteTrafic->nbre_exempte = $request->nbre_exempte;
            $recetteTrafic->violation = $request->violation;
            $recetteTrafic->total = ($request->vl + $request->mini_bus + $request->autocars_camion + $request->tricycle +  $request->roues2 + $request->pl_2essieux+ $request->pl_3essieux+ $request->pl_4essieux + 
            $request->pl_5essieux  + $request->pl_6essieux+ $request->pl_7essieux+ $request->pl_8essieux+ $request->pl_9essieux);
            $recetteTrafic->observation = $request->observation;

           // dd($recetteTrafic);

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


        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...

            $site = Site::where('libelle',session('site'))->first();
            $sites = Site::where('libelle',session('site'))->get();

                $agents  = Agents::where('site_id',$site->id)->get();
                $voies  = Voie::where('site_id',$site->id)->get();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();

        }


        return view('recettes.update',compact('agents','recetteTrafic','sites','voies'));
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
            $recetteTrafic->tricycle = $request->tricycle;
            $recetteTrafic->roues2 = $request->roues2;
            $recetteTrafic->pl_2essieux = $request->pl_2essieux;
            $recetteTrafic->pl_3essieux = $request->pl_3essieux;
            $recetteTrafic->pl_4essieux = $request->pl_4essieux;
            $recetteTrafic->pl_5essieux = $request->pl_5essieux;
            $recetteTrafic->pl_6essieux = $request->pl_6essieux;
            $recetteTrafic->pl_7essieux = $request->pl_7essieux;
            $recetteTrafic->pl_8essieux = $request->pl_8essieux;
            $recetteTrafic->pl_9essieux = $request->pl_9essieux;
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
        try {
            //code...
            $recetteTrafic = RecetesTrafic::find($id);
            $recetteTrafic->delete();
            flashy()->success("Recette supprimée avec succès");

            return back();

        } catch (\Throwable $th) {
            //throw $th;
            flashy()->error("supprimer avec echoue");

            return back();
        }
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




            if ($request->isMethod('POST')) {
                # code...
                $recetteTrafic = RecetesTrafic::query();

                $from = $request->input('date_debut');
                $to =$request->input('date_fin');

                $voie  = $request->input('voie_id');
                $vacation  = $request->input('vacation');
                $agent  = $request->input('agent');


                if ($from != null || $to != null) {
                    # code...
                    $recetteTrafic->whereBetween("date",  [$from, $to]);

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
                    $recetteTrafic->where("agent_voie", "=", $agent);
                }

                $site = Site::where('libelle',session('site'))->first();
                $recetteTrafic->where("site_id",$site->id);
                $recettes =  $recetteTrafic->get(['recettes_trafics.*']);
                session()->flashInput($request->all());

                $agents  = Agents::where('site_id',$site->id)->get();
                $voies  = Voie::where('site_id',$site->id)->get();

            }


            return view('recettes.index',compact('recettes',
            'voies','agents'
            ))->with($request->all());


        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }
    }
}
