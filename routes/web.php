<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConvocationController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.convocations.index');
    })->name('index');
    Route::get('convocations', [ConvocationController::class, 'index'])->name('convocations.index');
    Route::get('convocations/create', [ConvocationController::class, 'create'])->name('convocations.create');
    Route::get('convocations/edit/{id}', [ConvocationController::class, 'edit'])->name('convocations.edit');
    Route::post('convocations/store', [ConvocationController::class, 'store'])->name('convocations.store');
    Route::post('convocations/update/{id}', [ConvocationController::class, 'update'])->name('convocations.update');

    Route::patch('convocations/{id}/close', [ConvocationController::class, 'closeConvocation'])
         ->name('convocations.close');

    Route::get('convocations/centers', [ConvocationController::class, 'getCenterConvocations'])
         ->name('convocations.centers');

    Route::get('convocations/departments', [ConvocationController::class, 'getDepartmentsConvocations'])
         ->name('convocations.departments');
});
Route::get('/', function () {
    return view('home');
});
