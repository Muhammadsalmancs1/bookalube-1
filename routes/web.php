<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('\App\Http\Controllers')->group(function () {
    Route::resource('engines', 'EngineController')->names('engines');
    Route::resource('models', 'ModelController')->names('models');
    Route::resource('car_brands', 'CarBrandController')->names('car-brands');
    Route::resource('car-years', 'CarYearController')->names('car-years');
    Route::resource('services', 'ServiceController')->names('services');
    Route::resource('engine-oils', 'EngineOilController')->names('engine-oils');
    Route::resource('air-filters', 'AirFilterController')->names('air-filters');
    Route::resource('fuel-filters', 'FuelFilterController')->names('fuel-filters');
    Route::resource('oil-filters', 'OilFilterController')->names('oil-filters');
    Route::resource('transmission-filters', 'TransmissionFilterController')->names('transmission-filters');
});
