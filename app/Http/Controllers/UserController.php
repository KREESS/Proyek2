<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan halaman belajar
    public function belajar()
    {
        // Logika untuk menampilkan halaman belajar
        return view('user.belajar');
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
}
