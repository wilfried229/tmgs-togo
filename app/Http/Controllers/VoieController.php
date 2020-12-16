<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voie;
use Illuminate\Support\Facades\Log;

class VoieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $voies = Voie::all();
        return view('voie.index',compact('voies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('voie.create');
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
            //code...
        $voie  = new Voie();
        $voie->libelle = $request->libelle;
        $voie->save();

        return back();

        } catch (\Exception $ex) {
            //throw $th;
            Log::info($ex->getMessage());

            abort(500);
        }
        //


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
        return view('voie.show');
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
        $site = voie::find($id);
        return view('voie.update',compact('voie'));
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
        //
        try {
            //code...
        $voie  = Voie::find($id);
        $voie->libelle = $request->libelle;
        $voie->save();

        return back();

        } catch (\Exception $ex) {
            //throw $th;
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
    }
}
