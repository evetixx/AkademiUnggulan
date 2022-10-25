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
Route::get('/download/{irs}',[MahasiswaController::class,'openirs'])->name('mahasiswa.openirs')->middleware(['auth','role:doswal']);
Route::get('/download/{irs}',[MahasiswaController::class,'openirs'])->name('mahasiswa.openirs')->middleware(['auth','role:departemen']);
Route::get('/downloads/{khs}',[MahasiswaController::class,'openkhs'])->name('mahasiswa.openkhs')->middleware(['auth','role:doswal']);
Route::get('/downloads/{khs}',[MahasiswaController::class,'openkhs'])->name('mahasiswa.openkhs')->middleware(['auth','role:departemen']);
Route::get('/downloadss/{skripsi}',[MahasiswaController::class,'openskripsi'])->name('mahasiswa.openskripsi')->middleware(['auth','role:doswal']);
Route::get('/downloadss/{skripsi}',[MahasiswaController::class,'openskripsi'])->name('mahasiswa.openskripsi')->middleware(['auth','role:departemen']);
Route::get('/downloadsss/{pkl}',[MahasiswaController::class,'openpkl'])->name('mahasiswa.openpkl')->middleware(['auth','role:doswal']);
Route::get('/downloadsss/{pkl}',[MahasiswaController::class,'openpkl'])->name('mahasiswa.openpkl')->middleware(['auth','role:departemen']);
Route::get('/pkl/{id}',[MahasiswaController::class,'showpkl'])->name('mahasiswa.showpkl')->middleware(['auth','role:doswal']);
Route::get('/pkl/{id}',[MahasiswaController::class,'showpkl'])->name('mahasiswa.showpkl')->middleware(['auth','role:departemen']);
Route::post('/pkl/search',[MahasiswaController::class,'showpklajax'])->name('mahasiswa.showpklajax')->middleware(['auth','role:doswal']);
Route::post('/pkl/search',[MahasiswaController::class,'showpklajax'])->name('mahasiswa.showpklajax')->middleware(['auth','role:departemen']);
Route::get('/chart/pkl',[MahasiswaController::class,'chartpkl'])->name('mahasiswa.chartpkl')->middleware(['auth','role:doswal']);
Route::get('/chart/pkl',[MahasiswaController::class,'chartpkl'])->name('mahasiswa.chartpkl')->middleware(['auth','role:departemen']);
Route::get('/chart/skripsi',[MahasiswaController::class,'chartskripsi'])->name('mahasiswa.chartskripsi')->middleware(['auth','role:doswal']);
Route::get('/chart/skripsi',[MahasiswaController::class,'chartskripsi'])->name('mahasiswa.chartskripsi')->middleware(['auth','role:departemen']);
Route::get('/chart/status',[MahasiswaController::class,'chartstatus'])->name('mahasiswa.chartstatus')->middleware(['auth','role:doswal']);
Route::get('/chart/status',[MahasiswaController::class,'chartstatus'])->name('mahasiswa.chartstatus')->middleware(['auth','role:departemen']);
Route::get('/skripsi/{id}',[MahasiswaController::class,'showskripsi'])->name('mahasiswa.showskripsi')->middleware(['auth','role:doswal']);
Route::get('/skripsi/{id}',[MahasiswaController::class,'showskripsi'])->name('mahasiswa.showskripsi')->middleware(['auth','role:departemen']);
Route::post('/skripsi/search',[MahasiswaController::class,'showskripsiajax'])->name('mahasiswa.showskripsiajax')->middleware(['auth','role:doswal']);
Route::post('/skripsi/search',[MahasiswaController::class,'showskripsiajax'])->name('mahasiswa.showskripsiajax')->middleware(['auth','role:departemen']);
Route::get('/status/{id}',[MahasiswaController::class,'showstatus'])->name('mahasiswa.showstatus')->middleware(['auth','role:doswal']);
Route::get('/status/{id}',[MahasiswaController::class,'showstatus'])->name('mahasiswa.showstatus')->middleware(['auth','role:departemen']);
Route::post('/status/search',[MahasiswaController::class,'showstatusajax'])->name('mahasiswa.showstatusajax')->middleware(['auth','role:doswal']);
Route::post('/status/search',[MahasiswaController::class,'showstatusajax'])->name('mahasiswa.showstatusajax')->middleware(['auth','role:departemen']);
Route::get('/download/template/{id}',[MahasiswaController::class,'downloadtemplate'])->name('mahasiswa.downloadtemplate');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//route resource mahasiswa rith role operator and doswal middleware
Route::get('/mahasiswa/create', [MahasiswaController::class, 'import'])->middleware('auth','role:operator');
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth','role:doswal');
Route::get('/pkl', [App\Http\Controllers\MahasiswaController::class, 'pkl'])->name('mahasiswa.pkl')->middleware(['auth','role:doswal']);
Route::get('/pkl', [App\Http\Controllers\MahasiswaController::class, 'pkl'])->name('mahasiswa.pkl')->middleware(['auth','role:departemen']);
Route::get('/skripsi', [App\Http\Controllers\MahasiswaController::class, 'skripsi'])->name('mahasiswa.skripsi')->middleware(['auth','role:doswal']);
Route::get('/skripsi', [App\Http\Controllers\MahasiswaController::class, 'skripsi'])->name('mahasiswa.skripsi')->middleware(['auth','role:departemen']);
Route::get('/status', [App\Http\Controllers\MahasiswaController::class, 'status'])->name('mahasiswa.status')->middleware(['auth','role:doswal']);
Route::get('/status', [App\Http\Controllers\MahasiswaController::class, 'status'])->name('mahasiswa.status')->middleware(['auth','role:departemen']);

Auth::routes();


Route::resource('/home', 'App\Http\Controllers\HomeController')->middleware('auth');
Route::get('/mahasiswa/upload', function () {
    return view('upload')->middleware(['auth']);
})->name('upload')->middleware('auth');
Route::get('/file-import',[MahasiswaController::class,
            'importView'])->name('import-view'); 
Route::post('/mahasiswa/create',[MahasiswaController::class,
            'import'])->name('mahasiswa.import'); 
Route::get('/export-users',[MahasiswaController::class,
            'export'])->name('mahasiswa.export');
Route::get('/profile', [App\Http\Controllers\MahasiswaController::class, 'profile'])->name('profile')->middleware('auth');
Route::put('/profile/{nipnim}', [App\Http\Controllers\MahasiswaController::class, 'updateprofile'])->name('profile.update')->middleware('auth');
Route::put('uploadirs/{nim}',[MahasiswaController::class,'updateirs'])->name('mahasiswa.updateirs');
Route::put('uploadkhs/{id}',[MahasiswaController::class,'updatekhs'])->name('mahasiswa.updatekhs');
Route::put('uploadpkl/{id}',[MahasiswaController::class,'updatepkl'])->name('mahasiswa.updatepkl');
Route::put('uploadskripsi/{id}',[MahasiswaController::class,'updateskripsi'])->name('mahasiswa.updateskripsi');
            //route to get storage irs pdf
//Route::get('/mahasiswa/storage/irs/{pdf}',[MahasiswaController::class,'openPdf'])->name('mahasiswa.openPdf');

