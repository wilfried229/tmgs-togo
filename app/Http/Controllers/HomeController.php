<?php

namespace App\Http\Controllers;

use App\Models\RecetesTrafic;
use App\Models\Voie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       /*  $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [69, 59]
            ]
        ])
        ->options([]);
        return view('index',compact('chartjs')); */
        $result = DB::table('voie')->select('libelle')->get();
        //dd($year);


        $user = ['1000','500','300','500','600'];
      /*   foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        } */

        $result = RecetesTrafic::where('site_id','=',3)->distinct('date')->get();

       // dd($result);
        return view('index');
    	//return view('chartjs')->with('year',json_encode($year,JSON_BIGINT_AS_STRING))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
}
