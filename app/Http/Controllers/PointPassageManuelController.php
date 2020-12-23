<?php

namespace App\Http\Controllers;

use App\Models\PointPassageMaunel;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PointPassageManuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pointPassageManuels = PointPassageMaunel::all();
        $sites  = Site::all();
        $voies  = Voie::all();
        return view('pointPassageManuels.index',compact('pointPassageManuels','sites','voies'));
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
        return view('pointPassageManuels.create',compact('sites','voies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $pointPassage = new  PointPassageMaunel();
            $pointPassage->date  = $request->date;
            $pointPassage->voie_id  = $request->voie_id;
            $pointPassage->site_id  = $request->site_id;
            $pointPassage->vacation = $request->vacation;
            $pointPassage->identite_percepteur  = $request->identite_percepteur;
            $pointPassage->point_traf_info_mode_manuel  = $request->point_traf_info_mode_manuel;
            $pointPassage->solde_recette_info_mode_manuel  = $request->solde_recette_info_mode_manuel;
            $pointPassage->heure_debutComptage  = $request->heure_debutComptage;
            $pointPassage->heure_finComptage  = $request->heure_finComptage;
            $pointPassage->trafic_compteManu  = $request->trafic_compteManu;
            $pointPassage->equipRecette  = $request->equipRecette;
            $pointPassage->etaDonne_taficInformatiser  = $request->etaDonne_taficInformatiser;
            $pointPassage->etaDonne_recetteInformatiser  = $request->etaDonne_recetteInformatiser;

            $pointPassage->etaFinal_recetteInformatiser  = ($request->point_traf_info_mode_manuel+$request->trafic_compteManu+$request->etaDonne_taficInformatiser);
            $pointPassage->etaFinal_taficInformatiser  = ($request->solde_recette_info_mode_manuel+$request->equipRecette+$request->etaDonne_recetteInformatiser);

            $pointPassage->observation  = $request->observation;
            $pointPassage->user_id  = Auth::user()->id;
            $pointPassage->save();
            flashy()->success("Enregistrement effectuée avec succès");

            return  redirect()->back();


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
        $pointPassageManuel =PointPassageMaunel::find($id);
        $sites = Site::all();
        $voies  = Voie::all();
        return view('pointPassageManuels.update',compact('pointPassageManuel','sites','voies'));
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

            $pointPassage = PointPassageMaunel::find($id);
            $pointPassage->date  = $request->date;
            $pointPassage->voie_id  = $request->voie_id;
            $pointPassage->site_id  = $request->site_id;
            $pointPassage->vacation = $request->vacation;
            $pointPassage->identite_percepteur  = $request->identite_percepteur;
            $pointPassage->point_traf_info_mode_manuel  = $request->point_traf_info_mode_manuel;
            $pointPassage->solde_recette_info_mode_manuel  = $request->solde_recette_info_mode_manuel;
            $pointPassage->heure_debutComptage  = $request->heure_debutComptage;
            $pointPassage->heure_finComptage  = $request->heure_finComptage;
            $pointPassage->trafic_compteManu  = $request->trafic_compteManu;
            $pointPassage->equipRecette  = $request->equipRecette;
            $pointPassage->etaDonne_taficInformatiser  = $request->etaDonne_taficInformatiser;
            $pointPassage->etaDonne_recetteInformatiser  = $request->etaDonne_recetteInformatiser;

            $pointPassage->etaFinal_recetteInformatiser  = ($request->point_traf_info_mode_manuel+$request->trafic_compteManu+$request->etaDonne_taficInformatiser);
            $pointPassage->etaFinal_taficInformatiser  = ($request->solde_recette_info_mode_manuel+$request->equipRecette+$request->etaDonne_recetteInformatiser);

            $pointPassage->observation  = $request->observation;
            $pointPassage->user_id  = Auth::user()->id;;

            $pointPassage->update();

            return  redirect()->back();


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

        try {

            $pointPassageManuel = PointPassageMaunel::find($id);
            $pointPassageManuel->delete();

            return  redirect()->back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());
            abort(500);

        }
    }


    public function searchPassageManuelByAllRequest(Request $request){

        try {

            $pointPassageManuels= [];
            $sites  = Site::all();
            $voies  = Voie::all();

            if ($request->isMethod('POST')) {
                # code...
                $passage = PointPassageMaunel::query();

                $date  = $request->input('date');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');

                $vacation  = $request->input('vacation');
                $agent  = $request->input('identite_percepteur');

                if ($date != null) {
                    # code...
                    $passage->where("date", "=", $date);

                }


                if ($site != null) {
                    # code...
                    $passage->where("site_id", "=", $site);

                }



                if ($voie != null) {
                    # code...
                    $passage->where("voie_id", "=", $voie);

                }

                if ($vacation != null) {
                    # code...
                    $passage->where("vacation", "=", $vacation);

                }


                if ($agent != null) {
                    # code...
                    $passage->where("identite_percepteur", "=", $agent);
                }

                $pointPassageManuels =  $passage->get(['point_passage_manuelle.*']);

                session()->flashInput($request->all());

            }


            return view('pointPassageManuels.index',
            compact('pointPassageManuels','sites','voies'))->with($request->all());

        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }

}

}
