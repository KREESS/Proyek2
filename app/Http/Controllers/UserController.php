<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan halaman belajar
    public function belajar()
    {
        // Mengambil semua data materi dari database
        $materis = Materi::all();

        // Mengirim data materi ke view 'user.belajar'
        return view('user.belajar', compact('materis'));
    }

    // Menampilkan halaman tryout
    public function tryout()
    {
        // Logika untuk menampilkan halaman tryout
        return view('user.tryout');
    }

    // Menampilkan halaman history tryout
    public function historyTryout()
    {
        // Logika untuk menampilkan halaman history tryout
        return view('user.history_tryout');
    }

    // Menampilkan halaman feedback
    public function feedback()
    {
        // Logika untuk menampilkan halaman feedback
        return view('user.feedback');
    }

    public function show($id)
    {
        // Mengambil data materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Mengirim data materi ke view 'materi_show'
        return view('user.materi_show', compact('materi'));
    }
}
