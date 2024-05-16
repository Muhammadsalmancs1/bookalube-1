<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\tranmissionoil_controller;
use App\Http\Controllers\differntialoil_controller;


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
    return redirect('/login');
});

Route::get('/admin/login', function () {
    return redirect()->route('admin.login');
});
require __DIR__ . '/auth.php';




Route::middleware('auth')->namespace('\App\Http\Controllers')->group(function () {
    Route::get('dashboard', [FrontEndController::class,'index'])->name('dashboard');
    Route::get('add-vechiles', [FrontEndController::class,'addVechiles'])->name('addvechiles');
    Route::post('add-vechiles', [FrontEndController::class,'addVechilesStore'])->name('add-vechiles');
    Route::get('booking/{id}', [FrontEndController::class,'booking'])->name('booking');
    Route::post('booking-store', [FrontEndController::class,'bookingStore'])->name('booking.store');
    Route::get('booking-edit/{id}', [FrontEndController::class,'bookingEdit'])->name('booking.edit');
    Route::post('update-vechiles/{id}', [FrontEndController::class,'updateBooking'])->name('update.vechiles');
    Route::post('changeStatus/{id}', [FrontEndController::class,'changeStatus'])->name('change.status');
    Route::get('service-history/{id}', [FrontEndController::class,'serviceHistory'])->name('service-history');
    Route::get('upcoming-service/{id}', [FrontEndController::class,'upcomingService'])->name('upcoming-service');
    Route::get('/get-brands/{year}', [FrontEndController::class, 'getBrandsForYear']);
    Route::get('/get-models/{brand}', [FrontEndController::class, 'getModelsForBrand']);
    Route::get('/get-engines/{brand}', [FrontEndController::class, 'getEnginesForModel']);
    Route::get('get-litercombination', [FrontEndController::class, 'getlitercombination'])->name('get-litercombination');

    Route::get('/get-dates', [FrontEndController::class, 'getDisabledDates']);
    Route::get('/setting', [FrontEndController::class, 'setting'])->name('setting');
    Route::post('update-email', [FrontEndController::class, 'updateEmail'])->name('update.email');
    Route::get('password', [FrontEndController::class, 'password'])->name('password');
    Route::post('update-password', [FrontEndController::class, 'updatePassword'])->name('update.password');
    Route::get('referral-credit', [FrontEndController::class, 'referralCredit'])->name('referral.credit');
    Route::post('referral-credit', [FrontEndController::class, 'updateReferralCredit'])->name('update.referral.credit');



});

Route::middleware(['auth','is_admin'])->namespace('\App\Http\Controllers')->group(function () {
    Route::resource('users', 'UserController')->names('users');
});

Route::middleware(['auth','is_admin'])->namespace('\App\Http\Controllers')->prefix('catalog')->as('catalog.')->group(function () {
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
    Route::resource('year-combinations', 'YearCombinationController')->names('year-combinations');
    Route::resource('make-combinations', 'MakeCombinationController')->names('make-combinations');
    Route::resource('model-combinations', 'ModelCombinationController')->names('model-combinations');
    Route::resource('liter-combinations', 'LiterCombinationController')->names('liter-combinations');
    Route::resource('incoming-services', 'IncomingServiceController')->names('incoming-services');
    Route::get('booking', 'BookingController@index')->name('booking');
    Route::get('cancel-bookings/{id}', [BookingController::class,'cancel'])->name('cancel.bookings');
    Route::get('compelete-bookings/{id}', [BookingController::class,'compelete'])->name('compelete.bookings');
    Route::get('noshow-bookings/{id}', [BookingController::class,'noShow'])->name('noShow.bookings');
    Route::get('noshow-bookings/{id}', [BookingController::class,'noShow'])->name('noShow.bookings');
    Route::post('booking_note', [BookingController::class,'bookingNote'])->name('booking_note.bookings');
    Route::get('/get-vechiles/{id}', [BookingController::class, 'getVechile']);
    Route::post('update/vechile', [BookingController::class, 'updateVechile'])->name('update.vechicle');

    // tranmission oil
    Route::get('tranmission_oil', [tranmissionoil_controller::class,'index'])->name('tranmission_oil');
    Route::post('tranmission_oil_store', [tranmissionoil_controller::class,'store'])->name('tranmission_oil_store');
    Route::post('tranmission_oil_update', [tranmissionoil_controller::class,'update'])->name('tranmission_oil_update');
    Route::get('tranmission_oil_delete/{id}', [tranmissionoil_controller::class,'delete'])->name('tranmission_oil_delete');

 // differntial oil
 Route::get('differntialoil', [differntialoil_controller::class,'index'])->name('differntialoil');
 Route::post('differntialoil_store', [differntialoil_controller::class,'store'])->name('differntialoil_store');
 Route::post('differntialoil_update', [differntialoil_controller::class,'update'])->name('differntialoil_update');
 Route::get('differntial_oil_delete/{id}', [differntialoil_controller::class,'delete'])->name('differntial_oil_delete');


});


Route::middleware(['auth','is_admin'])->namespace('\App\Http\Controllers')->prefix('management')->as('management.')->group(function () {
    Route::resource('bays', 'BayController')->names('bays');
    Route::resource('bay-timeslots', 'BayTimeslotController')->names('bay-timeslots');
    Route::resource('leave-managements', 'LeaveManagementController')->names('leave-managements');
});



