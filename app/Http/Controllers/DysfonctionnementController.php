<?php

namespace App\Http\Controllers;

use App\Models\Dyfonctionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\voie;
use App\Models\site;
use Illuminate\Support\Facades\File;

class DysfonctionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dysfonctionnments  = Dyfonctionnement::all();

        return  view('dysfonct.index',compact('dysfonctionnments'));
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
        return view('dysfonct.create',compact('sites','voies'));
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

            $dysfonctionnment  = new  Dyfonctionnement();
            $dysfonctionnment->date = $request->date;

            $dysfonctionnment->localisation = $request->localisation;
            $dysfonctionnment->dysfonctionnement = $request->dysfonctionnement;
            $dysfonctionnment->cause = $request->cause;
            $dysfonctionnment->travauxArealiser = $request->travauxArealiser;
            $dysfonctionnment->travauxRealiser = $request->travauxRealiser;
            $dysfonctionnment->heureConstat = $request->heureConstat;
            $dysfonctionnment->heureDebutIntervention = $request->heureDebutIntervention;
            $dysfonctionnment->heureFinIntervention = $request->heureFinIntervention;
            $dysfonctionnment->resultatObtenir = $request->resultatObtenir;
            $dysfonctionnment->besoins = $request->besoins;

            $path = 'preuve';
            File::makeDirectory(public_path().'/'. $path, $mode = 0777, true, true);
            $dysfonctionnment->preuve_avant  = DysfonctionnementController::uploadImage($request->file('preuve_avant'),$path);
            $dysfonctionnment->preuve_apres  = DysfonctionnementController::uploadImage($request->file('preuve_apres'),$path);

            $dysfonctionnment->observation = $request->observation;
            $dysfonctionnment->site_id = $request->site_id;
            $dysfonctionnment->user_id = null;
            $dysfonctionnment->save();
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
        $sites = Site::all();
        $dysfonctionnment  = Dyfonctionnement::findOrFail($id);
        return  view('dysfonct.update',compact('dysfonctionnment','sites'));
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

            $dysfonctionnment  = Dyfonctionnement::findOrFail($id);
            $dysfonctionnment->date = $request->date;
            $dysfonctionnment->localisation = $request->localisation;
            $dysfonctionnment->dysfonctionnement = $request->dysfonctionnement;
            $dysfonctionnment->cause = $request->cause;
            $dysfonctionnment->travauxArealiser = $request->travauxArealiser;
            $dysfonctionnment->travauxRealiser = $request->travauxRealiser;
            $dysfonctionnment->heureConstat = $request->heureConstat;
            $dysfonctionnment->heureDebutIntervention = $request->heureDebutIntervention;
            $dysfonctionnment->heureFinIntervention = $request->heureFinIntervention;
            $dysfonctionnment->resultatObtenir = $request->resultatObtenir;
            $dysfonctionnment->besoins = $request->besoins;


            if ($request->file('preuve_avant') || $request->file('preuve_apres')) {
                # code...
                $path = 'preuve';
                File::makeDirectory(public_path().'/'. $path, $mode = 0777, true, true);
                $dysfonctionnment->preuve_avant  = DysfonctionnementController::uploadImage($request->file('preuve_avant'),$path);
                $dysfonctionnment->preuve_apres  = DysfonctionnementController::uploadImage($request->file('preuve_apres'),$path);

            }


            $dysfonctionnment->observation = $request->observation;

            $dysfonctionnment->site_id = $request->site_id;
            $dysfonctionnment->user_id = null;
            $dysfonctionnment->update();


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

            $dysfonctionnment  = Dyfonctionnement::findOrFail($id);
            $dysfonctionnment->delete();

            return  redirect()->back();
        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
        }
    }


     /**
     * Envoyer le mail de confirmation de compte après création de compte.
     * @param $name
     */
    public static function uploadImage($image,$folder){

        try {

        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/'.$folder);
        $image->move($destinationPath, $name);

        return $name;
        } catch (\Throwable $th) {

            Log::error($th->getMessage());
            return false;
        }
    }

}
