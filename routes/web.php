<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;

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


    // Route untuk user panel
    Route::prefix('user')->group(function () {
        Route::get('/belajar', [UserController::class, 'belajar'])->name('user.belajar');
        Route::get('/tryout', [UserController::class, 'tryout'])->name('user.tryout');
        Route::get('/history_tryout', [UserController::class, 'historyTryout'])->name('user.history_tryout');
        Route::get('/feedback', [UserController::class, 'feedback'])->name('user.feedback');
        Route::post('/feedback', [FeedbackController::class, 'store'])->name('user.feedback.store');
        // Tambahkan rute lainnya untuk user panel di sini
    });

    // route untuk admin panel
    Route::prefix('adminpanel')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/history_tryout', [AdminController::class, 'historyTryout'])->name('admin.history_tryout');
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
