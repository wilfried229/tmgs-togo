<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sites = Site::all();
        return view('site.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.create');
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
        $site  = new Site();
        $site->libelle = $request->libelle;
        $site->save();
    
        return back();
    
        } catch (\Exception $ex) {
            //throw $th;
            Log::info($ex->getMessage());

            abort(500);
        }        //
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
        return view('site.show');
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
        $site = Site::find($id);
        return view('site.update',compact('site'));
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
            //code...
        $site  = Site::find($id);
        $site->libelle = $request->libelle;
        $site->save();
    
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
        
        try {
            //code...
        $site  = Site::find($id);
        $site->delete();
    
        return back();
    
        } catch (\Exception $ex) {
            //throw $th;
            Log::info($ex->getMessage());

            abort(500);
        }   
    }
}
