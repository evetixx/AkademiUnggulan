<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/r', function () {
    return view('welcome');
});
Route::get('/download/{irs}','MahasiswaController::class@openPdf')->name('mahasiswa.openPdf')->middleware('open.pdf');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Auth::routes();

Route::resource('/mahasiswa', 'App\Http\Controllers\MahasiswaController')->middleware('auth');
Route::resource('/home', 'App\Http\Controllers\HomeController')->middleware('auth');
Route::get('/mahasiswa/upload', function () {
    return view('upload');
})->name('upload')->middleware('auth');
Route::get('/file-import',[MahasiswaController::class,
            'importView'])->name('import-view'); 
Route::post('/mahasiswa/create',[MahasiswaController::class,
            'import'])->name('mahasiswa.import'); 
Route::get('/export-users',[MahasiswaController::class,
            'export'])->name('mahasiswa.export');
            //route to get storage irs pdf
//Route::get('/mahasiswa/storage/irs/{pdf}',[MahasiswaController::class,'openPdf'])->name('mahasiswa.openPdf');

