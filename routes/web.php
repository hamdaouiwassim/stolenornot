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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/telephone/{id}/facture/ajouter', 'FacturesController@create')->name('Addfacture');
Route::post('/facture/adddb', 'FacturesController@store')->name('AddDBfacture');

Route::get('/telephone/{id}/contrat/ajouter', 'ContratsController@create')->name('Addcontrat');
Route::post('/contrat/adddb', 'ContratsController@store')->name('AddDBcontrat');


Route::get('/telephone/ajouter', 'TelephonesController@create')->name('Addtelephone');
Route::post('/telephone/adddb', 'TelephonesController@store')->name('AddDBtelephone');

Route::get('/telephone/{id}/voler', 'TelephonesController@decalarerVole')->name('voler');
Route::get('/verification/{id}/valider', 'VerificationsController@valider')->name('validerverification');
Route::get('/verification/{id}/refuser', 'VerificationsController@refuser')->name('refuserverification');