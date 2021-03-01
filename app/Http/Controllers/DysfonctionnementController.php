<?php

namespace App\Http\Controllers;

use App\Models\Dyfonctionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Voie;
use App\Models\Site;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Exports\DysfonctionnementExport;
use App\Imports\DysfonctionnementImport;
use Maatwebsite\Excel\Facades\Excel;

class DysfonctionnementController extends Controller
{

     /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new DysfonctionnementExport(), 'dysfonction.xlsx');
    }

     /**
     * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new DysfonctionnementImport(), $request->file('file_dysfonct')->store('disfonct'));

            flashy()->success("Dysfonctionnement importés avec succès");

            return back();
        }



    public function passageGatebySite($site){

        session()->get('site');
        session()->put('site', $site);
        $sites = Site::where('libelle',$site)->first();
        $dysfonctionnments = Dyfonctionnement::query()->where('site_id',$sites->id)->orderByDesc('id')->get();

        return view('dysfonct.index',compact('dysfonctionnments','sites'));


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function site()
    {

        $sites = Site::all();

        session()->forget(['site']);
        return view('dysfonct.site',compact('sites'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            $sites = Site::where('libelle',session('site'))->first();
            $dysfonctionnments  = Dyfonctionnement::query()->where('site_id',$sites->id)->orderByDesc('id')->get();
            # code...
        } else {
            # code...
            $dysfonctionnments  = Dyfonctionnement::where('site_id',Auth::user()->site_id)->orderByDesc('id')->get();
        }


        return  view('dysfonct.index',compact('dysfonctionnments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (in_array(Auth::user()->role,['ADMIN','SUPERADMIN'])){
            # code...
            $sites  = Site::all();
            $voies  = Voie::all();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
            $voies  = Voie::where('site_id',Auth::user()->site_id)->get();
        }

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
            if (in_array(Auth::user()->role,['ADMIN','SUP ERADMIN'])){
                $dysfonctionnment->site_id = $request->site_id;

            } else {
                $site = Site::where('id',Auth::user()->site_id)->first('id');
                $dysfonctionnment->site_id = $site->id;
            }
            $dysfonctionnment->user_id = Auth::user()->id;
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

        if (Auth::user()->role  == "ADMIN") {
            # code...
            $sites  = Site::all();
        } else {
            # code...
            $sites  = Site::where('id',Auth::user()->site_id)->first();
        }
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
            $dysfonctionnment->user_id = Auth::user()->id;
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
     * upload.
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



    public function searchDysfonctByAllRequest(Request $request){

        try {

            $dysfonctionnments = [];

            if ($request->isMethod('POST')) {
                # code...
                $dysfonctionnment = Dyfonctionnement::query();

                $from = $request->input('date_debut');
                $to =$request->input('date_fin');


                if ($from != null || $to != null) {
                    # code...
                    $dysfonctionnment->whereBetween("date",  [$from, $to]);

                }

                $sites = Site::where('libelle',session('site'))->first();

                $dysfonctionnment->where("site_id",$sites->id);

                $dysfonctionnments =  $dysfonctionnment->get(['dyfonctionnement.*']);

                session()->flashInput($request->all());


            }


        return  view('dysfonct.index',compact('dysfonctionnments'))->with($request->all());

        } catch (Exception $ex) {
            //throw $th;
            Log::error($ex->getMessage());
            abort(500);
        }
    }
}
