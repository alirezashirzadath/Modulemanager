<?php
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


if ($authmiddleware = config('authmodule.authMiddleware') != null){
    Route::prefix('panel')->middleware($authmiddleware)->group(function () {

        //main
        Route::get('modules',[\Modules\Modulemanager\Http\Controllers\MainController::class,'index'])->name('panel.modules');
        Route::post('modules/set',[\Modules\Modulemanager\Http\Controllers\MainController::class,'set'])->name('panel.modules.set');


    });
}else{
    Route::prefix('panel')->group(function () {

        //main
        Route::get('modules',[\Modules\Modulemanager\Http\Controllers\MainController::class,'index'])->name('panel.modules');
        Route::post('modules/set',[\Modules\Modulemanager\Http\Controllers\MainController::class,'set'])->name('panel.modules.set');


    });
}

