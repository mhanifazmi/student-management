<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => ''], function () {
    Route::get('', [StudentController::class, 'index'])
        ->name('student.index');

    Route::group(['prefix' =>'create'], function () {
        Route::get('', [StudentController::class, 'create'])
            ->name('student.create');

        Route::post('', [StudentController::class, 'store'])
            ->name('student.store');
    });

    Route::group(['prefix' =>'{student}'], function () {
        Route::get('', [StudentController::class, 'show'])
                ->name('student.show');

        Route::group(['prefix' =>'edit'], function () {
            Route::get('', [StudentController::class, 'edit'])
                ->name('student.edit');

            Route::post('', [StudentController::class, 'update'])
                ->name('student.update');
        });

        Route::get('delete', [StudentController::class, 'destroy'])
            ->name('student.destroy');
    });
});