<?php

namespace App\Http\Controllers;

use App\Models\Comptage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        $comptages  = Comptage::all();

        return  view('comptage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('');
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
            $comptage->site_id = $request->site_id;
            $comptage->vacation = $request->vacation;
            $comptage->nbre_passageManuel = $request->nbre_passageManuel;
            $comptage->nbre_passageSysteme = $request->nbre_passageSysteme;
            $comptage->montantManuel = $request->montantManuel;
            $comptage->montantInformatiser = $request->montantInformatiser;
            $comptage->observation = $request->observation;
            $comptage->user_id = $request->user_id;
            $comptage->save();

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

        $comptages  = Comptage::findOrFail($id);

        return  view('',compact('comptages'));
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
        $comptage->site_id = $request->site_id;
        $comptage->vacation = $request->vacation;
        $comptage->nbre_passageManuel = $request->nbre_passageManuel;
        $comptage->nbre_passageSysteme = $request->nbre_passageSysteme;
        $comptage->montantManuel = $request->montantManuel;
        $comptage->montantInformatiser = $request->montantInformatiser;
        $comptage->observation = $request->observation;
        $comptage->user_id = $request->user_id;
        $comptage->save();

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
}
