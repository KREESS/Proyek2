<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\SoalTryout;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LatihanController extends Controller
{
    public function index()
    {
        $materis = Materi::all();
        $materi_id = 1; // Ganti dengan nilai materi_id yang sesuai atau ambil dari request
        $materi = Materi::find($materi_id); // Ambil data materi berdasarkan materi_id

        // Gunakan session key yang unik untuk setiap pengguna dan materi
        $sessionKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;

        // Ambil soal-soal dari session jika sudah ada
        if (session()->has($sessionKey)) {
            $soalTryouts = session()->get($sessionKey);
        } else {
            // Ambil dari database jika belum ada di session
            $soalTryouts = SoalTryout::where('materi_id', $materi_id)->inRandomOrder()->take(5)->get();
            session()->put($sessionKey, $soalTryouts);
        }

        return view('user.soal_latihan', compact('materis', 'materi', 'soalTryouts'));
    }

    public function show($materi_id)
    {
        $materi = Materi::findOrFail($materi_id);

        // Gunakan session key yang unik untuk setiap pengguna dan materi
        $sessionKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;

        // Ambil soal-soal dari session jika sudah ada
        if (session()->has($sessionKey)) {
            $soalTryouts = session()->get($sessionKey);
        } else {
            // Ambil dari database jika belum ada di session
            $soalTryouts = SoalTryout::where('materi_id', $materi_id)->inRandomOrder()->take(5)->get();
            session()->put($sessionKey, $soalTryouts);
        }

        return view('user.soal_latihan', compact('materi', 'soalTryouts', 'materi_id'));
    }

    public function finish($materi_id)
    {
        $cacheKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;
        Cache::forget($cacheKey); // Hapus cache jika perlu (jika menggunakan cache)

        // Gunakan session key yang unik untuk setiap pengguna dan materi
        $sessionKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;

        // Hapus session yang menyimpan soal-soal untuk materi ini
        if (session()->has($sessionKey)) {
            session()->forget($sessionKey);
        }

        return redirect()->route('user.belajar');
    }
}
