<?php

namespace App\Http\Controllers;

use App\Models\Comptage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class ComptageController extends Controller
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
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){

            $comptages  = Comptage::query()->orderByDesc('id')->get();

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
        $sites = Site::all();
        $voies  = Voie::all();
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
            if (Auth::user()->role  == "ADMIN") {
                $comptage->site_id = $request->site_id;

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
        $sites = Site::all();
        $voies  = Voie::all();
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
            $comptage->site_id = $request->site_id;

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

                $date  = $request->input('date');
                $site  = $request->input('site_id');
                $voie  = $request->input('voie_id');

                $vacation  = $request->input('vacation');

                if ($date != null) {
                    # code...
                    $comptage->where("date", "=", $date);
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

                $comptages =  $comptage->get(['comptage_contraditoire.*']);


                session()->flashInput($request->all());
            }


            return  view('comptage.index',compact('comptages','voies','sites'))->with($request->all());

        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }

    }
}
