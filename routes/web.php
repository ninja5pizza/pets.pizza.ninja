<?php

use App\Http\Controllers\PulverizerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pulverizer', fn () => redirect('/pulverizers'));
Route::get('/pulverizers', [PulverizerController::class, 'index']);

Route::get('/pulverizer/{type}', [PulverizerController::class, 'show'])
    ->whereIn(
        'type',
        collect(config('pulverizers'))->keys()->all()
    )
    ->name('pulverizer');
