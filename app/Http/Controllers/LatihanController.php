<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\SoalTryout;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LatihanController extends Controller
{
    public function show($materi_id)
    {
        // Ambil data materi berdasarkan $materi_id
        $materi = Materi::findOrFail($materi_id);

        // Gunakan session key yang unik untuk setiap pengguna dan materi
        $sessionKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;

        // Ambil soal-soal dari session jika sudah ada
        if (Session::has($sessionKey)) {
            $soalTryouts = Session::get($sessionKey);
        } else {
            // Ambil dari database jika belum ada di session
            $soalTryouts = SoalTryout::where('materi_id', $materi_id)->inRandomOrder()->take(5)->get();
            Session::put($sessionKey, $soalTryouts);
        }

        return view('user.soal_latihan', compact('materi', 'soalTryouts', 'materi_id'));
    }

    public function finish(Request $request, $materi_id)
    {
        // Validasi data jawaban
        $request->validate([
            'jawaban.*.soal_tryout_id' => 'required|exists:soal_tryout,id',
            'jawaban.*.jawaban' => 'required|string|in:A,B,C,D,E',
        ]);

        // Mulai menyimpan jawaban ke dalam model UserAnswer
        $userAnswer = new UserAnswer();
        $userAnswer->user_id = auth()->id();

        foreach ($request->jawaban as $index => $jawaban) {
            switch ($index) {
                case 1:
                    $userAnswer->soal_tryout_id1 = $jawaban['soal_tryout_id'];
                    $userAnswer->jawaban1 = $jawaban['jawaban'];
                    break;
                case 2:
                    $userAnswer->soal_tryout_id2 = $jawaban['soal_tryout_id'];
                    $userAnswer->jawaban2 = $jawaban['jawaban'];
                    break;
                case 3:
                    $userAnswer->soal_tryout_id3 = $jawaban['soal_tryout_id'];
                    $userAnswer->jawaban3 = $jawaban['jawaban'];
                    break;
                case 4:
                    $userAnswer->soal_tryout_id4 = $jawaban['soal_tryout_id'];
                    $userAnswer->jawaban4 = $jawaban['jawaban'];
                    break;
                case 5:
                    $userAnswer->soal_tryout_id5 = $jawaban['soal_tryout_id'];
                    $userAnswer->jawaban5 = $jawaban['jawaban'];
                    break;
            }
        }

        // Simpan ke database
        $userAnswer->save();

        // Hapus session yang menyimpan soal-soal untuk materi ini
        $sessionKey = 'soal_tryouts_' . auth()->id() . '_' . $materi_id;
        if (session()->has($sessionKey)) {
            session()->forget($sessionKey);
        }

        // Redirect ke halaman belajar atau halaman lain yang sesuai
        return redirect()->route('user.belajar');
    }
}
