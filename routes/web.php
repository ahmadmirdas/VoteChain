 <?php

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


    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/tps/{id}', 'FrontEndController@tps')->name('tps');
    // Route::get('/tps2', 'FrontEndController@tps2')->name('tps');

    Route::post('verify/tps1', 'FrontEndController@verify1')->name('admin.verify1');
    Route::post('verify/tps2', 'FrontEndController@verify2')->name('admin.verify2');

    Route::get('tps/1/status', 'FrontEndController@checkStatusTps1')->name('status.check.tps');
    Route::post('tps/{id}/status/update', 'FrontEndController@checkStatusTpsUpdate')->name('status.check.tps.update');

    // Route::get('/', 'FrontEndController@kandidat')->name('index');
    //
    Route::post('/tps1', 'FrontEndController@coblos1')->name('coblos1.kandidat');
    Route::post('/tps2', 'FrontEndController@coblos2')->name('coblos2.kandidat');
    // Route::get('/masuk', function () {
    // 	return view('vendor.adminlte.loginku');
    // });
    // Route::get('/nyoblos', function () {
    // 	return view('home.votepage');
    // });
    // Route::get('/coblos/nik','FrontEndController@coblos')->name('coblos');

    Auth::routes();

    // Admin Pemilih
    // Route::get('/admin/pemilih', 'PemilihController@pemilih');
    // Route::post('/admin/buat-pemilih', 'PemilihController@buat');
    // Route::get('/admin/pemilih/{id}/edit-pemilih', 'PemilihController@edit');
    // Route::post('/admin/pemilih/{id}/update-pemilih', 'PemilihController@update');
    // Route::get('/admin/pemilih/{id}/delete-pemilih', 'PemilihController@delete');

    // Admin Kandidat
    Route::get('/admin/kandidat', 'KandidatController@kandidat');
    Route::post('/admin/buat-kandidat', 'KandidatController@buat');
    Route::get('/admin/kandidat/{id}/edit-kandidat', 'KandidatController@edit');
    Route::post('/admin/kandidat/{id}/update-kandidat', 'KandidatController@update');
    Route::get('/admin/kandidat/{id}/delete-kandidat', 'KandidatController@delete');

    // Admin TPS
    Route::get('/admin/tps', 'TpsController@tps');
    Route::post('/admin/buat-tps', 'TpsController@buat');
    Route::get('/admin/tps/{id}/edit-tps', 'TpsController@edit');
    Route::post('/admin/tps/{id}/update-tps', 'TpsController@update');
    Route::get('/admin/tps/{id}/show-tps', 'TpsController@show')->name('show.pemilih');
    Route::post('/admin/tps/show-tps/buat-pemilih', 'TpsController@buatpemilih')->name('buat.pemilih');

    // Admin Perhitungan Suara
    Route::get('/admin/penghitungan-suara', 'PenghitunganSuaraController@penghitungansuara');
    Route::get('/admin/penghitungan-suara/{id}/show-suara', 'PenghitunganSuaraController@show')->name('show.suara');

    // Admin Total Suara
    Route::get('/admin/total-suara', 'TotalSuaraController@tampil');

    // Admin Control TPS
    Route::get('/admin/control-tps', 'TpsController@control');

    // Admin Laporan Kandidat
    Route::get('admin/laporankandidat', 'LaporanKandidatController@laporankandidat');

    // Admin Berita Acara
    Route::get('/admin/berita-acara', 'BeritaAcaraController@tampil');
    Route::get('/admin/berita-acara/export', 'BeritaAcaraController@export')->name('export.berita-acara');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
    });
