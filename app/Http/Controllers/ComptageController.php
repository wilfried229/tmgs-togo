<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Comptage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComptagesExport;

class ComptageController extends Controller
{

    
     /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new ComptagesExport(), 'comptage.xlsx');
    }

    public function passageGatebySite($site){

        session()->get('site');
        session()->put('site', $site);
        $sites = Site::where('libelle',$site)->first();
        $agents  = Agents::where('site_id',$sites->id)->get();
        $voies  = Voie::where('site_id',$sites->id)->get();
        $comptages  = Comptage::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        return  view('comptage.index',compact('comptages','voies','sites'));


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function site()
    {

        $sites = Site::all();

        session()->forget(['site']);
        return view('comptage.site',compact('sites'));
    }

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
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){

            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();

            $comptages  = Comptage::query()->where('site_id',$sites->id)->orderByDesc('id')->get();


        } else {
            # code...
             $comptages  = Comptage::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();

        }



        return  view('comptage.index',compact('comptages','voies','sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...
            $sites = Site::where('libelle',session('site'))->first();
            $voies  = Voie::where('site_id',$sites->id)->get();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }

        return  view('comptage.create',compact('sites','voies'));
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
        try {
            $comptage  = new  Comptage();
            $comptage->date = $request->date;
            $comptage->voie_id = $request->voie_id;
            if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
                $sites = Site::where('libelle',session('site'))->first();
                $comptage->site_id = $sites->id;

            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $comptage->site_id = $site->id;
            }
            $comptage->vacation = $request->vacation;
            $comptage->nbre_passageManuel = $request->nbre_passageManuel;
            $comptage->nbre_passageSysteme = $request->nbre_passageSysteme;
            $comptage->montantManuel = $request->montantManuel;
            $comptage->montantInformatiser = $request->montantInformatiser;
            $comptage->observation = $request->observation;
            $comptage->user_id = Auth::user()->id;
            $comptage->save();
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

        $comptages  = Comptage::findOrFail($id);

        return  view('',compact('comptages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $comptage  = Comptage::findOrFail($id);
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
        return  view('comptage.update',compact('comptage','sites','voies'));
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

        $comptage  = Comptage::findOrFail($id);
        $comptage->date = $request->date;
        $comptage->voie_id = $request->voie_id;
        if (Auth::user()->role  == "ADMIN") {
            $sites = Site::where('libelle',session('site'))->first();
            $comptage->site_id = $sites->id;


        } else {
            $site = Site::where('id',Auth::user()->site_id)->first('id');
            $comptage->site_id = $site->id;
        }
        $comptage->vacation = $request->vacation;
        $comptage->nbre_passageManuel = $request->nbre_passageManuel;
        $comptage->nbre_passageSysteme = $request->nbre_passageSysteme;
        $comptage->montantManuel = $request->montantManuel;
        $comptage->montantInformatiser = $request->montantInformatiser;
        $comptage->observation = $request->observation;
        $comptage->user_id = Auth::user()->id;

        $comptage->save();
        flashy()->success("Modification effectuée avec succès");
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
        //

        try {

            $comptage  = Comptage::findOrFail($id);
            $comptage->delete();

            return  redirect()->back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
        }
    }



    public function searchComptageByAllRequest(Request $request){

        try {

            $comptages = [];
            $sites  = Site::all();
            $voies  = Voie::all();

            if ($request->isMethod('POST')) {
                # code...
                $comptage = Comptage::query();

                $from = $request->input('date_debut');
                $to =$request->input('date_fin');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');

                $vacation  = $request->input('vacation');

                if ($from != null || $to != null) {
                    # code...
                    $comptage->whereBetween("date",[$from, $to]);

                }


                if ($site != null) {
                    # code...
                    $comptage->where("site_id", "=", $site);
                }

                if ($voie != null) {
                    # code...
                    $comptage->where("voie_id", "=", $voie);
                }

                if ($vacation != null) {
                    # code...
                    $comptage->where("vacation", "=", $vacation);
                }

                $sites = Site::where('libelle',session('site'))->first();

                $comptage->where("site_id",$sites->id);
                $comptages =  $comptage->get(['comptage_contraditoire.*']);


                session()->flashInput($request->all());

                $sites = Site::where('libelle',session('site'))->first();
                $voies  = Voie::where('site_id',$sites->id)->get();

                $site = $sites->libelle;

            }


            return  view('comptage.index',compact('comptages','voies','sites'))->with($request->all());

        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }

    }
}
