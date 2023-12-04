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

Route::get('/contacts', function () {

    $busca = request('search');

    return view('contacts', ['busca' => $busca]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/contacts/{id?}', function ($id = null) {
    return view('contact', ['id' => $id]);
});
