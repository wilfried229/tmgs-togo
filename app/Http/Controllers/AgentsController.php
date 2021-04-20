<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agents  = Agents::all();
        return view('agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sites  = Site::all();
        return view('agents.create',compact('sites'));
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
            $agent  = new Agents();
            $agent->nom  = $request->nom;
            $agent->site_id = $request->site_id;
            $agent->save();
            flashy()->success("Enregistrement effectuée avec succès");
            return back();
        } catch (\Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            flashy()->error("Error de modification");

        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show(Agents $agents)
    {
        //

        return view('agents.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent  = Agents::find($id);
        $sites  = Site::all();

        return view('agents.update',compact('agent','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $agent  = Agents::find($id);
            $agent->nom = $request->nom;
            $agent->site_id = $request->site_id;
            $agent->save();

            flashy()->success("Modification effectuée avec succès");

            return back();

        } catch (\Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());

            flashy()->error("Error de modification");
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agents $agents)
    {
        //
    }
}
