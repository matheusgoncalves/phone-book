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

use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::get('/new', [ContactController::class, 'create']);
Route::get('/contacts', [ContactController::class, 'contacts']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/update/{id}', [ContactController::class, 'update']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
