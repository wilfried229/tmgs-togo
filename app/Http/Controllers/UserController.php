<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\Site;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new UsersImport(), $request->file('file')->store('temp'));
            return back();
        }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new UsersExport(), 'users-collection.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users  = User::get();
        return view('users.liste',compact('users'));
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
        return view('users.add',compact('sites'));
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

            if ($request->password != $request->password_confirmation) {
                # code...

                Session::flash('success', 'Mot de passe non identique');
                return redirect()->back();
            }

            $user  = new User();
            $user->name  = $request->name;
            $user->email  = $request->email;
            $user->password  = Hash::make($request->password);
            $user->role  = $request->role;
            $user->site_id  = $request->site_id;

            $user->save();
            Session::flash('success', 'Utilisateur ajoutée avec succès ');

            return redirect()->back();
        } catch (\Exception $ex) {
            //throw $th;
            Session::flash('error', $ex->getMessage());

            Log::info($ex->getMessage());
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
        $user  = User::find($id);
        $sites  = Site::all();
        return view('users.update',compact('user','sites'));
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

            $user  = User::find($id);
            $user->name  = $request->name;
            $user->email  = $request->email;

            if($request->password != null || $request->password != ""){
                $user->password  = Hash::make($request->password);
            }
            $user->role  = $request->role;
            $user->site_id  = $request->site_id;
            $user->save();

            Session::flash('success', 'Utilisateur modifiée avec succès ');

            return back();
        } catch (\Exception $ex) {
            //throw $th;
            Session::flash('error', $ex->getMessage());

            Log::info($ex->getMessage());

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

        $user  = User::find($id);
        $user->delete();

            Session::flash('success','Utilisateur supprimée succès ');

            return back();

        } catch (\Exception $ex) {
            Session::flash('error', $ex->getMessage());

            Log::info($ex->getMessage());
        }
        //
    }
}
