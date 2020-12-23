<?php

namespace App\Http\Controllers;

use App\Models\PassageUhf;
use App\Models\PointPassage;
use App\Models\PointRecapPayement;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PointRecapPayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $passageGate  = PointPassage::query()->select('somme_total_trafic','somme_total_recette_equialente')->get();

        $passageUhf  = PassageUhf::query()->select('somme_total_trafic','somme_total_recette_equialente')->get();

        dd($passageGate,$passageUhf);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function show(PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function edit(PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointRecapPayement $pointRecapPayement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointRecapPayement  $pointRecapPayement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointRecapPayement $pointRecapPayement)
    {
        //
    }
}
