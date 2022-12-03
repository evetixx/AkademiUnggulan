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

Route::group(['middleware' => ['exclude:mahasiswa']], function () {
        Route::get('/download/{irs}',[MahasiswaController::class,'openirs'])->name('mahasiswa.openirs');
        Route::get('/downloads/{khs}',[MahasiswaController::class,'openkhs'])->name('mahasiswa.openkhs');
        Route::get('/downloadss/{skripsi}',[MahasiswaController::class,'openskripsi'])->name('mahasiswa.openskripsi');
        Route::get('/downloadsss/{pkl}',[MahasiswaController::class,'openpkl'])->name('mahasiswa.openpkl');
        Route::get('/pkl/{id}',[MahasiswaController::class,'showpkl'])->name('mahasiswa.showpkl');
        Route::post('/pkl/search',[MahasiswaController::class,'showpklajax'])->name('mahasiswa.showpklajax');
        Route::get('/skripsi/{id}',[MahasiswaController::class,'showskripsi'])->name('mahasiswa.showskripsi');
        Route::post('/skripsi/search',[MahasiswaController::class,'showskripsiajax'])->name('mahasiswa.showskripsiajax');
        Route::get('/status/{id}',[MahasiswaController::class,'showstatus'])->name('mahasiswa.showstatus');
        Route::post('/status/search',[MahasiswaController::class,'showstatusajax'])->name('mahasiswa.showstatusajax');
        Route::post('/mahasiswa/search',[MahasiswaController::class,'showmahasiswasetujuiajax'])->name('mahasiswa.showmahasiswasetujuiajax');
        Route::get('/pkl', [App\Http\Controllers\MahasiswaController::class, 'pkl'])->name('mahasiswa.pkl');
        Route::get('/skripsi', [App\Http\Controllers\MahasiswaController::class, 'skripsi'])->name('mahasiswa.skripsi');
        Route::get('/status', [App\Http\Controllers\MahasiswaController::class, 'status'])->name('mahasiswa.status');
        Route::get('/chart/pkl',[MahasiswaController::class,'chartpkl'])->name('mahasiswa.chartpkl');
        Route::get('/chart/skripsi',[MahasiswaController::class,'chartskripsi'])->name('mahasiswa.chartskripsi');
        Route::get('/chart/status',[MahasiswaController::class,'chartstatus'])->name('mahasiswa.chartstatus');
});
Route::get('/download/template/{id}',[MahasiswaController::class,'downloadtemplate'])->name('mahasiswa.downloadtemplate');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//route resource mahasiswa rith role operator and doswal middleware
Route::get('/mahasiswa/create', [MahasiswaController::class, 'import'])->middleware('auth','role:operator');
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth','role:doswal');


Auth::routes();


Route::resource('/home', 'App\Http\Controllers\HomeController')->middleware('auth');
Route::get('/mahasiswa/upload', function () {
    return view('upload')->middleware(['auth']);
})->name('upload')->middleware('auth');
Route::get('/file-import',[MahasiswaController::class,
            'importView'])->name('import-view'); 
Route::post('/mahasiswa/create',[MahasiswaController::class,
            'import'])->name('mahasiswa.import'); 
Route::post('/mahasiswa/create/mhs',[MahasiswaController::class,
            'storemhs'])->name('mahasiswa.storemhs');
Route::post('/mahasiswa/create/doswal',[MahasiswaController::class,
            'storedoswal'])->name('mahasiswa.storedoswal');
Route::get('/export-users',[MahasiswaController::class,
            'export'])->name('mahasiswa.export');
Route::get('/profile', [App\Http\Controllers\MahasiswaController::class, 'profile'])->name('profile')->middleware('auth');
Route::put('/profile/{nipnim}', [App\Http\Controllers\MahasiswaController::class, 'updateprofile'])->name('profile.update')->middleware('auth');
Route::put('uploadirs/{nim}',[MahasiswaController::class,'updateirs'])->name('mahasiswa.updateirs');
Route::put('uploadkhs/{id}',[MahasiswaController::class,'updatekhs'])->name('mahasiswa.updatekhs');
Route::put('uploadpkl/{id}',[MahasiswaController::class,'updatepkl'])->name('mahasiswa.updatepkl');
Route::put('uploadskripsi/{id}',[MahasiswaController::class,'updateskripsi'])->name('mahasiswa.updateskripsi');
Route::get('/password', [App\Http\Controllers\MahasiswaController::class, 'password'])->name('password')->middleware('auth');
Route::put('/password/{nipnim}', [App\Http\Controllers\MahasiswaController::class, 'updatepassword'])->name('password.update')->middleware('auth');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
            //route to get storage irs pdf
//Route::get('/mahasiswa/storage/irs/{pdf}',[MahasiswaController::class,'openPdf'])->name('mahasiswa.openPdf');

