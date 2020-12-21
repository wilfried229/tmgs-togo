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





Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('/', 'HomeController@index')->name('home');

    Route::resources([
        'recettes-trafics' =>'RecetteTraficController',
        'comptage'=>'ComptageController',
        'dysfonctionement'=>'DysfonctionnementController',
        'point-passage'=>'PointPassageController',
        'point-passage-manuel'=> 'PointPassageManuelController',
        'site' =>'SiteController',
        'voie' => 'VoieController'
    ]);

    Route::post('recettes-trafics/search','RecetteTraficController@searchRecettesByAllRequest')->name('recettes.trafics.search');
});

Route::get("payement-manquant/{id}",'RecetteTraficController@payerManquant')->name('payement.manquant');
Route::get('file-import-export', 'UserController@fileImportExport');
Route::post('file-import', 'UserController@fileImport')->name('file-import');
Route::get('file-export', 'UserController@fileExport')->name('file-export');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
