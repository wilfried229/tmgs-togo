<?php

namespace App\Http\Controllers;

use App\Models\PassageUhf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;

class PassageUhfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $PassageUhf = PassageUhf::all();
        $sites  = Site::all();
        $voies  = Voie::all();
        return view('PassageUhf.index',compact('PassageUhf','sites','voies'));
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
        return view('PassageUhf.create',compact('voies','sites'));
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
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function show(PassageUhf $passageUhf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function edit(PassageUhf $passageUhf)
    {
        //
        $pointPassage = PointPassage::findOrFail($id);
        $sites = Site::all();
        $voies  = Voie::all();
        return view('PassageUhf.update',compact('PassageUhf','voies','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassageUhf $passageUhf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassageUhf  $passageUhf
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassageUhf $passageUhf)
    {
        //
    }
}
