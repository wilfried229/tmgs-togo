<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::get('/', 'HomeController@index')->name('home');

    Route::resources([
        'recettes-trafics' =>'RecetteTraficController',
        'comptage'=>'ComptageController',
        'dysfonctionement'=>'DysfonctionnementController',
        'point-passage'=>'PointPassageController',
        'point-passage-uhf'=>'PassageUhfController',
        'point-passage-manuel'=> 'PointPassageManuelController',
        'site' =>'SiteController',
        'voie' => 'VoieController',
        'point-recap' =>'PointRecapPayementController',
        'agent' => 'AgentsController',
        'users' =>'UserController'
    ]);

    Route::post('recettes-trafics/search','RecetteTraficController@searchRecettesByAllRequest')->name('recettes.trafics.search');
    Route::post('passage-gate/search','PointPassageController@searchPassageByAllRequest')->name('passage.gate.search');

    Route::post('passage-uhf/search','PassageUhfController@searchPassageByAllRequest')->name('passage.uhf.search');

    Route::post('passage-manuel/search','PointPassageManuelController@searchPassageManuelByAllRequest')->name('passage.manuel.search');

    Route::post('comptage/search','ComptageController@searchComptageByAllRequest')->name('comptage.search');

    Route::get("payement-manquant/{id}",'RecetteTraficController@payerManquant')->name('payement.manquant');

    Route::get('file-import-export', 'UserController@fileImportExport');
    Route::post('file-import', 'UserController@fileImport')->name('file-import');
    Route::get('file-export', 'UserController@fileExport')->name('file-export');


    Route::get('recettes/trafics/site','RecetteTraficController@site')->name('recettes.trafics.site');
    Route::get('recettes/trafics/{site}','RecetteTraficController@recettesbySite')->name('recettes.trafics.site.liste');

    Route::get('passage-uhf/site','PassageUhfController@site')->name('passage.uhf.site');
    Route::get('passage/uhf/{site}','PassageUhfController@passageGatebySite')->name('passage.uhf.list.site');


    Route::get('passage-gate/site','PointPassageController@site')->name('passage.gate.site');
    Route::get('passage/gate/{site}','PointPassageController@passageGatebySite')->name('passage.gate.list.site');

    Route::get('passage-manuel/site','PointPassageManuelController@site')->name('passage.manuel.site');
    Route::get('passage/manuel/{site}','PointPassageManuelController@passageGatebySite')->name('passage.manuel.list.site');


    Route::get('comptage/site','ComptageController@site')->name('comptage.site');


});

Auth::routes();
