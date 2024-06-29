<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\TryoutController;

// halaman home awal semua user
Route::get('/', function () {
    return view('welcome');
});

// Route login admin dan user
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->usertype === 'admin') {
            return redirect()->route('admin.index');
        } else {
            return view('user.dashboard');
        }
    })->name('dashboard');


    Route::prefix('user')->group(function () {
        Route::get('/belajar', [UserController::class, 'belajar'])->name('user.belajar');
        Route::get('/tryout', [UserController::class, 'tryout'])->name('user.tryout');
        Route::post('/tryout/finish', [TryoutController::class, 'finish'])->name('tryout.finish');
        Route::get('/tryout/start', [TryoutController::class, 'start'])->name('tryout.start');
        Route::get('/tryout/start2', [TryoutController::class, 'start2'])->name('tryout.start2');
        Route::get('/tryout/start3', [TryoutController::class, 'start3'])->name('tryout.start3');
        Route::get('/tryout/start4', [TryoutController::class, 'start4'])->name('tryout.start4');
        Route::get('/tryout/start5', [TryoutController::class, 'start5'])->name('tryout.start5');
        Route::get('/tryout/start6', [TryoutController::class, 'start6'])->name('tryout.start6');
        Route::get('/tryout/start7', [TryoutController::class, 'start7'])->name('tryout.start7');
        Route::get('/tryout/start8', [TryoutController::class, 'start8'])->name('tryout.start8');
        Route::get('/tryout/end', [TryoutController::class, 'end'])->name('tryout.end');
        Route::get('/history_tryout', [UserController::class, 'historyTryout'])->name('user.history_tryout');
        Route::get('/history_soal_detail/{id}/{jawaban}', [UserController::class, 'historySoalDetail'])->name('user.history_soal_detail');
        Route::get('/history_soal_latihan', [UserController::class, 'historySoalLatihan'])->name('user.history_soal_latihan');
        Route::get('/feedback', [UserController::class, 'feedback'])->name('user.feedback');
        Route::post('/feedback', [FeedbackController::class, 'store'])->name('user.feedback.store');
        Route::get('/latihan/{id}', [LatihanController::class, 'show'])->name('user.soal_latihan');
        Route::post('/finish/{materi_id}', [LatihanController::class, 'finish'])->name('user.finish');
        Route::get('/materi/{id}', [UserController::class, 'show'])->name('user.materi_show');
        // Tambahkan rute lainnya untuk user panel di sini
    });

    // route untuk admin panel
    Route::prefix('adminpanel')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/history_tryout', [AdminController::class, 'historyTryout'])->name('admin.history_tryout');
        Route::get('/history_soal_latihan', [AdminController::class, 'historySoalLatihan'])->name('admin.history_latihan_soal');
        Route::get('/kelola_materi', [AdminController::class, 'kelolaMateri'])->name('admin.kelola_materi');
        Route::get('/kelola_soal_tryout', [AdminController::class, 'kelolaSoalTryout'])->name('admin.kelola_soal_tryout');
        Route::get('/kelola_feedback', [AdminController::class, 'kelolaFeedback'])->name('admin.kelola_feedback');
        Route::get('/kelola_soal_tryout/tambah_soal_tryout', [AdminController::class, 'tambahSoal'])->name('admin.tambah_soal_tryout');
        Route::get('/soal_tryout/edit/{id}', [AdminController::class, 'editSoalTryout'])->name('admin.edit_soal_tryout');
        Route::put('/soal_tryout/update/{id}', [AdminController::class, 'updateSoalTryout'])->name('admin.update_soal_tryout');
        Route::delete('/soal_tryout/delete/{id}', [AdminController::class, 'deleteSoalTryout'])->name('admin.delete_soal_tryout');
        Route::get('/kelola_materi/tambah_materi', [AdminController::class, 'tambahMateri'])->name('admin.tambah_materi');
        Route::get('/kelola_materi/edit_materi/{id}', [AdminController::class, 'editMateri'])->name('admin.edit_materi');
        Route::put('/materi/{id}', [AdminController::class, 'updateMateri'])->name('admin.update_materi');
        Route::delete('/kelola_materi/delete_materi/{id}', [AdminController::class, 'deleteMateri'])->name('admin.delete_materi');
        Route::get('/kelola_feedback', [AdminController::class, 'kelolaFeedback'])->name('admin.kelola_feedback');
        Route::delete('/kelola_feedback/delete_feedback/{id}', [AdminController::class, 'deleteFeedback'])->name('admin.delete_feedback');
        // Tambahkan rute lainnya untuk admin panel di sini
    });
});
Route::post('/soal-tryout', [AdminController::class, 'store']);
Route::post('/materi', [AdminController::class, 'materi']);