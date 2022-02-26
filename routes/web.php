<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['prefix'=>'candidates'],function(){
    Route::get('/', [CandidateController::class, 'index'])->name('candidates.index');
    Route::post('/import', [CandidateController::class, 'import'])->name('candidates.import');
});

Route::group(['prefix'=>'jobs'],function(){
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::post('/import', [JobController::class, 'import'])->name('jobs.import');
});
