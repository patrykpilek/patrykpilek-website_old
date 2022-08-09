<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Controllers\Home\HomeController;
=======
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
=======
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
=======
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/', HomeController::class)->name('HomePage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
=======
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
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
=======
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
=======
>>>>>>> parent of 878166c (Laravel Authentication (Jetstream))
});
