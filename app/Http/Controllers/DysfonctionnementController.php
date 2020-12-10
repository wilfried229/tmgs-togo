<?php

namespace App\Http\Controllers;

use App\Models\Dyfonctionnement;
use Illuminate\Http\Request;

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

        return  view('',compact('dysfonctionnments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('');
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
            $dysfonctionnment->preuve = $request->preuve;
            $dysfonctionnment->observation = $request->observation;
            $dysfonctionnment->site_id = $request->site_id;
            $dysfonctionnment->voie_id = $request->voie_id;
            $dysfonctionnment->user_id = $request->user_id;
            $dysfonctionnment->save();

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
        $dysfonctionnment  = Dyfonctionnement::findOrFail($id);
        return  view('',compact('dysfonctionnment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dysfonctionnment  = Dyfonctionnement::findOrFail($id);
        return  view('',compact('dysfonctionnment'));
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
            $dysfonctionnment->preuve = $request->preuve;
            $dysfonctionnment->observation = $request->observation;

            $dysfonctionnment->site_id = $request->site_id;
            $dysfonctionnment->voie_id = $request->voie_id;
            $dysfonctionnment->user_id = $request->user_id;
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
}
