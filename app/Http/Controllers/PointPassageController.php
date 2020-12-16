<?php

namespace App\Http\Controllers;

use App\Models\PointPassage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\voie;
use App\Models\site;


class PointPassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pointPassages = PointPassage::all();
        
        return view('pointPassage.index',compact('pointPassages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $sites = Site::all();
        $voies  = Voie::all();
        return view('pointPassage.create',compact('voies','sites'));
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
            $pointPassage->vacation_6h = $request->vacation_6h;
            $pointPassage->vacation_14h = $request->vacation_14h;
            $pointPassage->vacation_20h = $request->vacation_20h;

            $pointPassage->type_passage_offline = $request->type_passage_offline;
            $pointPassage->type_passage_online = $request->type_passage_online;
            
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

        $pointPassages = PointPassage::findOrFail($id);
        return view('pointPassage.update',compact('pointPassages'));
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
            $pointPassage->vacation_6h = $request->vacation_6h;
            $pointPassage->vacation_14h = $request->vacation_14h;
            $pointPassage->vacation_20h = $request->vacation_20h;

            $pointPassage->type_passage_offline = $request->type_passage_offline;
            $pointPassage->type_passage_online = $request->type_passage_online;
            
            $pointPassage->somme_total_recette_equialente = $request->somme_total_recette_equialente;
            $pointPassage->paiement_espece_defaut_provision = $request->paiement_espece_defaut_provision;
            $pointPassage->observations = $request->observations;
            $pointPassage->user_id = auth()->user()->id;
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
