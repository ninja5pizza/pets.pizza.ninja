<?php

use App\Http\Controllers\PulverizerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pulverizer/{type}', PulverizerController::class)
    ->whereIn(
        'type',
        collect(config('pulverizers'))->keys()->all()
    )
    ->name('pulverizer');
