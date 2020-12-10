<?php

namespace App\Http\Controllers;

use App\Models\PointPassage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PointPassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        try {

            $pointPassage = new  PointPassage();
            $pointPassage->date  = $request->date;
            $pointPassage->voie_id = $request->voie_id;
            $pointPassage->site_id = $request->site_id;
            $pointPassage->vacation = $request->vacation;
            $pointPassage->somme_total_recette_equialente = $request->somme_total_recette_equialente;
            $pointPassage->paiement_espece_defaut_provision = $request->paiement_espece_defaut_provision;
            $pointPassage->observations = $request->observations;
            $pointPassage->user_id = $request->user_id;
            $pointPassage->save();

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
            $pointPassage->site_id = $request->site_id;
            $pointPassage->vacation = $request->vacation;
            $pointPassage->somme_total_recette_equialente = $request->somme_total_recette_equialente;
            $pointPassage->paiement_espece_defaut_provision = $request->paiement_espece_defaut_provision;
            $pointPassage->observations = $request->observations;
            $pointPassage->user_id = $request->user_id;
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

            return  redirect()->back();

        }catch (\Exception $ex){

            Log::info($ex->getMessage());

            abort(500);
        }
    }
}
