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

    Route::post('dysfonct-ionement/search','DysfonctionnementController@searchDysfonctByAllRequest')->name('dysfonction.search');


    Route::get("payement-manquant/{id}",'RecetteTraficController@payerManquant')->name('payement.manquant');



    Route::get('recettes/trafics/site','RecetteTraficController@site')->name('recettes.trafics.site');
    Route::get('recettes/trafics/{site}','RecetteTraficController@recettesbySite')->name('recettes.trafics.site.liste');

    Route::get('passage-uhf/site','PassageUhfController@site')->name('passage.uhf.site');
    Route::get('passage/uhf/{site}','PassageUhfController@passageGatebySite')->name('passage.uhf.list.site');


    Route::get('passage-gate/site','PointPassageController@site')->name('passage.gate.site');
    Route::get('passage/gate/{site}','PointPassageController@passageGatebySite')->name('passage.gate.list.site');

    Route::get('passage-manuel/site','PointPassageManuelController@site')->name('passage.manuel.site');
    Route::get('passage/manuel/{site}','PointPassageManuelController@passageGatebySite')->name('passage.manuel.list.site');

    Route::get('compt/site','ComptageController@site')->name('compt.site');

    Route::get('compt/{site}','ComptageController@passageGatebySite')->name('compt.list.site');

    Route::get('dysfon-ctionement/site','DysfonctionnementController@site')->name('dysfonct.site');

    Route::get('dysfon-ctionement/{site}','DysfonctionnementController@passageGatebySite')->name('dysfonct.list.site');


    Route::get('file-import-export', 'UserController@fileImportExport')->name('import');
    Route::post('file-import', 'UserController@fileImport')->name('file-import');
    Route::get('file-export', 'UserController@fileExport')->name('file-export');


    Route::get('file-import-export-all', 'RecetteTraficController@fileImportExport')->name('file-export.all');

    Route::get('file-export-recettes', 'RecetteTraficController@fileExport')->name('file-export.recettes');
    Route::post('file-import-recettes', 'RecetteTraficController@fileImport')->name('file-Import.recettes');

    Route::get('file-export-gate', 'PointPassageController@fileExport')->name('file-export.gate');

    Route::get('file-export-uhf', 'PassageUhfController@fileExport')->name('file-export.uhf');

    Route::get('file-export-manuel', 'PointPassageManuelController@fileExport')->name('file-export.manuel');

    Route::get('file-export-dysfonc', 'DysfonctionnementController@fileExport')->name('file-export.disfonct');

    Route::get('file-export-comptage', 'ComptageController@fileExport')->name('file-export.comptage');


    Route::post('chatsJs','ChatJsController@recettes')->name('statistique-recette.chart');
    Route::get('statistique-recette','ChatJsController@statistiqueRecette')->name('statistique-recette.view');
    Route::get('statistique-trafics','ChatJsController@statistiqueTrafics')->name('statistique-trafics.view');
    Route::post('statistique-trafics-post','ChatJsController@trafics')->name('statistique-trafics.chart');

    Route::get('statistique-passage-gate','ChatJsController@statistiquePassageGate')->name('statistique-passage-gate.view');
    Route::post('statistique-passage-gate-post','ChatJsController@passageGate')->name('statistique.passageGate');


});

Auth::routes();
