<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SoalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/winners', [MainController::class, 'winners'])->name('winners');
Route::get('/home', function () {
    return redirect('/');
});

Route::resource('account', AccountController::class);
Route::get('/api/cities/{provinceId}', [AccountController::class, 'getCitiesByProvince'])->name('citiesByProvince');

// tampilan auth
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistForm'])->name('register');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'doLogout'])->name('doLogout')->middleware('auth');

    Route::get('/tambah-anggota/{number}', [ClientController::class, 'tambah_anggota'])->middleware('memberUnfulfilled');
    Route::post('/simpan-anggota', [ClientController::class, 'store_anggota'])->name('store_anggota')->middleware('memberUnfulfilled');
    Route::get('/tambah-anggota', [ClientController::class, 'redirect_tambah_anggota'])->name('tambah-anggota')->middleware('memberUnfulfilled');
});

// tampilan dashboard
Route::middleware(['auth', 'memberFulfilled'])->group(function () {
    Route::get('/confirmed', [ClientController::class, 'confirmed'])->name('confirmed');
    Route::get('/payment', [ClientController::class, 'payment'])->name('payment');
    Route::patch('/payment/{account}', [ClientController::class, 'store_payment'])->name('store_payment');
    Route::get('/pending', [ClientController::class, 'pending'])->name('pending');
    Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
    Route::get('/edit-anggota/{student}', [ClientController::class, 'edit_anggota'])->name('edit_anggota')->middleware('accountMember');
    Route::put('/edit-anggota/{student}', [ClientController::class, 'update_anggota'])->name('update_anggota')->middleware('accountMember');
});

// tampilan competition
Route::middleware(['auth', 'memberFulfilled', 'isVerified'])->group(function () {
    Route::get('/competition', [CompetitionController::class, 'competition'])->name('competition');
    Route::get('/olympiad/penyisihan/{no}', [CompetitionController::class, 'attempt_penyisihan'])->name('attempt_penyisihan')->middleware('isOlympiad');
    Route::put('/olympiad/penyisihan/{no}', [CompetitionController::class, 'answer_penyisihan'])->name('answer_penyisihan')->middleware('isOlympiad');
    Route::put('/competition/submit', [CompetitionController::class, 'attempt_uiux'])->name('attempt_uiux')->middleware('isUiux');
    Route::get('/after-form', [CompetitionController::class, 'afterForm'])->name('afterForm');
});

// tampilan semifinal
Route::middleware(['auth', 'memberFulfilled', 'isVerified', 'isOlympiad', 'isSemifinalist'])->group(function () {
    Route::get('/olympiad/semifinal/{no}', [CompetitionController::class, 'attempt_semifinal'])->name('attempt_semifinal');
    Route::put('/olympiad/semifinal/{no}', [CompetitionController::class, 'answer_semifinal'])->name('answer_semifinal');
});


// tampilan admin
Route::middleware(['admin'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
    Route::get('/admin/tabel-verify', [AdminController::class, 'verify'])->name('tabel-verify');
    Route::get('/admin/tabel-verify/download', [AdminController::class, 'download'])->name('download-tabel');
    Route::get('/admin/tabel-olympiad', [AdminController::class, 'olympiad'])->name('tabel-olympiad');
    Route::get('/admin/tabel-uiux', [AdminController::class, 'uiux'])->name('tabel-uiux');
    Route::get('/admin/{id}/info', [AdminController::class, 'info'])->name('info');
    Route::post('/admin/tabel-verify/update-status', [AdminController::class, 'updateStatusBayar'])->name('updateStatusBayar');
    Route::patch('/admin/{account}/info/kwitansi', [AdminController::class, 'tambahkwitansi'])->name('store_kwitansi');
    Route::patch('/admin/info/sertif/{student}', [AdminController::class, 'tambahSertif'])->name('store_sertif');

    // Soal
    // Pilgan
    Route::get('/admin/list-soal/{babak}', [SoalController::class, 'list_soal'])->name('list_soal');
    Route::get('/admin/list-soal/{babak}/add-pilgan', [SoalController::class, 'add_pilgan'])->name('add_pilgan');
    Route::post('/admin/list-soal/{babak}/add-pilgan', [SoalController::class, 'create_pilgan'])->name('create_pilgan');
    Route::delete('/admin/list-soal/{id}/delete', [SoalController::class, 'deleteSoal'])->name('delete_soal');
    Route::get('/admin/list-soal/{babak}/id/{id}/edit', [SoalController::class, 'edit_pilgan'])->name('edit_pilgan');
    Route::put('/admin/list-soal/{babak}/id/{id}/edit', [SoalController::class, 'update_pilgan'])->name('update_pilgan');

    // Essai
    Route::get('/admin/list-soal/{babak}/add-essay', [SoalController::class, 'add_essay'])->name('add_essay');
    Route::post('/admin/list-soal/{babak}/add-essay', [SoalController::class, 'create_essay'])->name('create_essay');
    Route::get('/admin/list-soal/{babak}/id/{id}/edit-essay', [SoalController::class, 'edit_essay'])->name('edit_essay');
    Route::put('/admin/list-soal/{babak}/id/{id}/edit-essay', [SoalController::class, 'update_essay'])->name('update_essay');

    // Hasil
    Route::get('/admin/hasil/uiux', [AdminController::class, 'hasil_uiux'])->name('hasil_uiux');
    Route::get('/admin/hasil/olympiad', [AdminController::class, 'hasil_olim'])->name('hasil_olim');
    Route::get('/admin/hasil/olympiad/penyisihan-desc', [AdminController::class, 'hasil_olim_penyisihan_desc'])->name('hasil_olim_penyisihan_desc');
    Route::get('/admin/hasil/olympiad/semifinal-desc', [AdminController::class, 'hasil_olim_semifinal_desc'])->name('hasil_olim_semifinal_desc');
    Route::get('/admin/hasil/olympiad/penilaian-essay/{id}', [AdminController::class, 'penilaian_essay'])->name('penilaian_essay');
    Route::put('/admin/hasil/olympiad/penilaian-essay/{id}/isi-nilai', [AdminController::class, 'isi_nilai'])->name('isi_nilai');
    Route::get('/admin/hasil/olympiad/penyisihan/{id}', [AdminController::class, 'detail_penyisihan'])->name('detail_penyisihan');
    Route::get('/admin/hasil/olympiad/semifinal/{id}', [AdminController::class, 'detail_semifinal'])->name('detail_semifinal');
});
