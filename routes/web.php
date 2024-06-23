<?php

use App\Http\Controllers\WEB\EmployeeController;
use App\Http\Controllers\WEB\GovernorateController;
use App\Http\Controllers\WEB\OfficeController;
use App\Http\Controllers\WEB\ProfileController;
use App\Http\Controllers\WEB\RateController;
use App\Http\Controllers\WEB\TruckController;
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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('offices', OfficeController::class);
    Route::get('governorates',[GovernorateController::class,'getDovernorates']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('trucks', TruckController::class);
    Route::post('/rates', [RateController::class, 'store'])->name('rates.store');
});

// Display a listing of the resource.


require __DIR__.'/auth.php';
