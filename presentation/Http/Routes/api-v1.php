<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Presentation\Http\Actions\CalculateRateAction;
use Presentation\Http\Actions\CreateRateAction;
use Presentation\Http\Actions\DeleteRateAction;
use Presentation\Http\Actions\EditRateAction;
use Presentation\Http\Actions\ListRatesAction;

Route::get('/rates', ListRatesAction::class)
    ->name('v1.rates.list');
Route::post('/rates', CreateRateAction::class)
    ->name('v1.rates.create');
Route::put('/rates/{id}', EditRateAction::class)
    ->name('v1.rates.edit');
Route::delete('/rates/{id}', DeleteRateAction::class)
    ->name('v1.rates.delete');
Route::post('/rates/calculate', CalculateRateAction::class)
    ->name('v1.rates.calculate');
