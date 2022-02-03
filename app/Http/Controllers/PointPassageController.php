<?php

namespace App\Http\Controllers;

use App\Exports\PassageGateExport;
use App\Models\Agents;
use App\Models\PointPassage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class PointPassageController extends Controller
{

     /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new PassageGateExport(), 'passageGate.xlsx');
    }


     /**
     * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new PointPassage(), $request->file('file_recettes')->store('temp'));

            flashy()->success("Passage importés avec succès");

            return back();
        }


    public function passageGatebySite($site){

        session()->get('site');
        session()->put('site', $site);
        $sites = Site::where('libelle',$site)->first();
        $agents  = Agents::where('site_id',$sites->id)->get();
        $voies  = Voie::where('site_id',$sites->id)->get();


        $pointPassages = PointPassage::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        return view('pointPassage.index',compact('pointPassages','site','voies'));


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
        return view('pointPassage.site',compact('sites'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){


            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();
            $pointPassages = PointPassage::query()->where('site_id',$sites->id)->orderByDesc('id')->get();


        } else {
            # code...
            $sites  = Site::all();
        $voies  = Voie::all();
            $pointPassages = PointPassage::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();
        }
        return view('pointPassage.index',compact('pointPassages','sites','voies'));
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
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
            $agents  = Agents::where('site_id',Auth::user()->site_id)->get();


        }


        return view('pointPassage.create',compact('voies','sites','agents'));
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

            $pointPassage = new PointPassage();
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
            //$pointPassage->passage_gate= $request->passage_gate;

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

        $pointPassage = PointPassage::findOrFail($id);
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){

            # code...
            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }
        return view('pointPassage.update',compact('pointPassage','voies','sites'));
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

            $pointPassage = PointPassage::find($id);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $pointPassage = PointPassage::find($id);
            $pointPassage->delete();

            flashy()->success("Suppression effectuée avec succès");

            return  redirect()->back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
        }
    }

    public function searchPassageByAllRequest(Request $request){

        try {

            $pointPassages= [];

            if ($request->isMethod('POST')) {
                # code...
                $passage = PointPassage::query();


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

                $sites = Site::where('libelle',session('site'))->first();

                $passage->where("site_id",$sites->id);
                $pointPassages =  $passage->get(['point_passages.*']);
                session()->flashInput($request->all());
                $voies  = Voie::where('site_id',$sites->id)->get();

                $site = $sites->libelle;
            }


            return view('pointPassage.index',
            compact('pointPassages','site','voies'))->with($request->all());;


        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }
    }


}
