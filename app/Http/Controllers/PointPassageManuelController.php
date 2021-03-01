<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\PointPassageMaunel;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PassageManuelExport;

class PointPassageManuelController extends Controller
{

     /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new PassageManuelExport(), 'passageManuel.xlsx');
    }


     /**
     * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new PointPassageMaunel(), $request->file('file_passage_manuel')->store('temp'));

            flashy()->success("Passage manuel importés avec succès");

            return back();
        }
    public function passageGatebySite($site){

        session()->get('site');
        session()->put('site', $site);
        $sites = Site::where('libelle',$site)->first();
        $agents  = Agents::where('site_id',$sites->id)->get();
        $voies  = Voie::where('site_id',$sites->id)->get();


        $pointPassageManuels = PointPassageMaunel::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        return view('pointPassageManuels.index',compact('pointPassageManuels','sites','voies','agents'));


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

        return view('pointPassageManuels.site',compact('sites'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...

            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();
            $agents  = Agents::where('site_id',$sites->id)->get();

            $pointPassageManuels = PointPassageMaunel::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        } else {
            # code...
            $sites  = Site::where('site_id',Auth::user()->site_id)->first();
            $voies  = Voie::all();
        $agents  = Agents::where('site_id',$sites->id)->get();

            $pointPassageManuels = PointPassageMaunel::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();
        }
        return view('pointPassageManuels.index',compact('pointPassageManuels','sites','voies','agents'));
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
            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();

        $agents  = Agents::where('site_id',$sites->id)->get();

        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->get();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();

        }



        return view('pointPassageManuels.create',compact('sites','voies','agents'));
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
            if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
                $sites = Site::where('libelle',session('site'))->first();
                $pointPassage->site_id = $sites->id;

            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $pointPassage->site_id = $site->id;
            }
            $pointPassage->vacation = $request->vacation;
            $pointPassage->identite_percepteur  = Agents::where('nom',$request->identite_percepteur)->first()->nom;
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
        if (Auth::user()->role  == "ADMIN") {
            # code...
            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();
        $agents  = Agents::where('site_id',$sites->id)->get();

        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();

        }
        return view('pointPassageManuels.update',compact('pointPassageManuel','sites','voies','agents'));
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


            if ($request->isMethod('POST')) {
                # code...
                $passage = PointPassageMaunel::query();
                $from = $request->input('date_debut');
                $to =$request->input('date_fin');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');

                $vacation  = $request->input('vacation');
                $agent  = $request->input('identite_percepteur');

                if ($from != null || $to != null) {
                    # code...
                    $passage->whereBetween("date",[$from, $to]);

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

                $sites = Site::where('libelle',session('site'))->first();

                $passage->where("site_id",$sites->id);


                $pointPassageManuels =  $passage->get(['point_passage_manuelle.*']);

                session()->flashInput($request->all());
                $voies  = Voie::where('site_id',$sites->id)->get();
                $agents  = Agents::where('site_id',$sites->id)->get();

                $site = $sites->libelle;
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
