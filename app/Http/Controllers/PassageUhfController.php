<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\PassageUhf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;

class PassageUhfController extends Controller
{

    public function passageGatebySite($site){

        session()->get('site');
        session()->put('site', $site);
        $sites = Site::where('libelle',$site)->first();
        $agents  = Agents::where('site_id',$sites->id)->get();
        $voies  = Voie::where('site_id',$sites->id)->get();


        $passageUhfs = PassageUhf::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        return view('passageUhf.index',compact('passageUhfs','sites','voies','site'));


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
        return view('passageUhf.site',compact('sites'));
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
            $passageUhfs = PassageUhf::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

            $site  = session('site');

        } else {
            $sites  = Site::all();
            $voies  = Voie::all();
            # code...
            $siteU  = Site::where('site_id',Auth::user()->site_id)->first();
            $site = $siteU->libelle;

            $passageUhfs = PassageUhf::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();
        }
        //

        return view('passageUhf.index',compact('passageUhfs','sites','site','voies'));
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
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }
        $agents  = Agents::all();

        return view('passageUhf.create',compact('voies','sites','agents'));
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

            $pointPassage = new PassageUhf();
            $pointPassage->date  = $request->date;
            $pointPassage->voie_id = $request->voie_id;
            if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
                $sites = Site::where('libelle',session('site'))->first();
                $pointPassage->site_id = $sites->id;

            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $pointPassage->site_id = $site->id;
            }

            $pointPassage->vacation_6h = $request->vacation_6h;
            $pointPassage->vacation_14h = $request->vacation_14h;
            $pointPassage->vacation_20h = $request->vacation_20h;
           // $pointPassage->passage_uhf= $request->passage_uhf;

           $pointPassage->somme_total_trafic = ($request->vacation_6h +$request->vacation_14h +$request->vacation_20h);

           $pointPassage->somme_total_recette_equialente = ($request->vacation_6h +$request->vacation_14h +$request->vacation_20h)*300;

            $pointPassage->paiement_espece_defaut_provision = $request->paiement_espece_defaut_provision;
            $pointPassage->paiement_espece_dysfon = $request->paiement_espece_dysfon;

            $pointPassage->observations = $request->observations;

            $pointPassage->user_id = Auth::user()->id;


            $pointPassage->save();
            flashy()->success("Enregistrement effectuée avec succès");


            return back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function show(PassageUhf $passageUhf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $passageUhf = PassageUhf::findOrFail($id);
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){

            # code...
            # code...
            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();

        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }
        return view('passageUhf.update',compact('passageUhf','voies','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        try {

            $pointPassage = PassageUhf::find($id);
            $pointPassage->date  = $request->date;
            $pointPassage->voie_id = $request->voie_id;
            if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
                $pointPassage->site_id = $request->site_id;
            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $pointPassage->site_id = $site->id;
            }


            $pointPassage->vacation_6h = $request->vacation_6h;
            $pointPassage->vacation_14h = $request->vacation_14h;
            $pointPassage->vacation_20h = $request->vacation_20h;
            $pointPassage->somme_total_trafic = ($request->vacation_6h +$request->vacation_14h +$request->vacation_20h);
            $pointPassage->somme_total_recette_equialente = ($request->vacation_6h +$request->vacation_14h +$request->vacation_20h)*300;
            $pointPassage->paiement_espece_defaut_provision = $request->paiement_espece_defaut_provision;
            $pointPassage->paiement_espece_dysfon = $request->paiement_espece_dysfon;
            $pointPassage->observations = $request->observations;
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
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassageUhf $passageUhf)
    {
        //
    }


    public function searchPassageByAllRequest(Request $request){

        try {

            $passageUhfs = [];
            $sites  = Site::all();
            $voies  = Voie::all();
            if ($request->isMethod('POST')) {
                # code...
                $passage = PassageUhf::query();
                $from = $request->input('date_debut');
                $to =$request->input('date_fin');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');

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

                $passageUhfs =  $passage->get(['passage_uhfs.*']);
                session()->flashInput($request->all());

                $sites = Site::where('libelle',session('site'))->first();
                $voies  = Voie::where('site_id',$sites->id)->get();

                $site = $sites->libelle;

            }


            return view('passageUhf.index',
            compact('passageUhfs','sites','voies'))->with($request->all());;


        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }
    }
}
