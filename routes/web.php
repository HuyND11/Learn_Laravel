<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\CalculatorController;
use Illuminate\Http\Request;

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

// Route::resource('cars', CarController::class);


    Route::get("/cars", [CarController::class, 'index'])->name("car.index");
    Route::get("/cars/create", [CarController::class, "create"])->name("car.create");
    Route::post("/cars/store", [CarController::class, "store"])->name("car.store");
    Route::get("/cars/{id}", [CarController::class, "show"])->name('car.show');
    Route::post("/cars/update/{id}", [CarController::class, "update"])->name('car.update');
    Route::get("/cars/delete/{id}", [CarController::class, "destroy"])->name('car.destroy');
    Route::get("/cars/{id}/edit", [CarController::class, "edit"])->name('car.edit');



Route::post("PTB1",[DemoController::class, "GPTB1_POST"])->name('PTB1_post');

Route::get('PTB1', function(){
    return view("Demo/PTB1");
});

Route::get('calculator', function() {
    return view("Demo/Calculation");
});

Route::post('calculator', [CalculatorController::class, "calculate"])->name("calculate");



?>
