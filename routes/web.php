<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PilotAuthController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TakeFlightController;
use App\Http\Controllers\UserController;
use App\Mail\FlightCancellationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(UserController::class)->group(function () {
    Route::get('/user-table', 'index')->name('user-table');
    Route::get('/edit.users/{id}', 'edit')->name('edit.users');
    Route::post('/update.users', 'update')->name('update.users');
    Route::post('/add.users', 'add')->name('add.users');
    Route::delete('/delete.users/{id}', 'delete')->name('delete.users');

});

Route::controller(FlightController::class)->group(function () {
    Route::get('/flight-table', 'index')->name('flight-table');
    Route::get('/edit.flights/{id}', 'edit')->name('edit.flights');
    Route::post('/update.flights', 'update')->name('update.flights');
    Route::post('/add.flights', 'add')->name('add.flights');
    Route::delete('/delete.flights/{id}', 'delete')->name('delete.flights');
    Route::get('/data-table-flights', 'datatable')->name('data-table-flights');
});

Route::controller(AircraftController::class)->group(function () {
    Route::get('/aircraft-table', 'index')->name('aircraft-table');
    Route::get('/edit.aircraft/{id}', 'edit')->name('edit.aircraft');
    Route::post('/update.aircraft', 'update')->name('update.aircraft');
    Route::post('/add.aircraft', 'add')->name('add.aircraft');
    Route::delete('/delete.aircraft/{id}', 'delete')->name('delete.aircraft');
    Route::get('/data-table-aircraft', 'datatable')->name('data-table-aircraft');
});

Route::controller(CityController::class)->group(function () {
    Route::get('/city-table', 'index')->name('city-table');
    Route::get('/edit.cities/{id}', 'edit')->name('edit.cities');
    Route::post('/update.cities', 'update')->name('update.cities');
    Route::post('/add.cities', 'add')->name('add.cities');
    Route::delete('/delete.cities/{id}', 'delete')->name('delete.cities');
    Route::get('/data-table-cities', 'datatable')->name('data-table-cities');
    Route::get('/data-table-top-cities', 'showTopFiveVisitedCities')->name('data-table-top-cities');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/order-table', 'index')->name('order-table');
    Route::get('/edit.orders/{id}', 'edit')->name('edit.orders');
    Route::post('/update.orders', 'update')->name('update.orders');
    Route::post('/add.orders', 'add')->name('add.orders');
    Route::delete('/delete.orders/{id}', 'delete')->name('delete.orders');
});

Route::controller(PilotController::class)->group(function () {
    Route::get('/pilot-table', 'index')->name('pilot-table');
    Route::get('/edit.pilots/{id}', 'edit')->name('edit.pilots');
    Route::post('/update.pilots', 'update')->name('update.pilots');
    Route::post('/add.pilots', 'add')->name('add.pilots');
    Route::delete('/delete.pilots/{id}', 'delete')->name('delete.pilots');
});

Route::controller(PilotAuthController::class)->group(function () {
    Route::post('register-pilot', 'registerPilot')->name('register-pilot');
});

Route::controller(PlaceOrderController::class)->group(function () {
    Route::post('place-order', 'placeOrder')->name('place-order');
    Route::get('data-table-my-orders', 'showMyOrders')->name('data-table-my-orders');
});

Route::controller(TakeFlightController::class)->group(function () {
    Route::post('/take-flight', 'takeFlight')->name('take-flight');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
