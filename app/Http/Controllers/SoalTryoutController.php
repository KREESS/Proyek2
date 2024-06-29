<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\SoalTryout;
use Illuminate\Http\Request;

class SoalTryoutController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $validatedData = $request->validate([
            'question_type' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Ambil materi berdasarkan $request->materi_id
        $materi = Materi::find($request->materi_id);

        // Pastikan materi ditemukan sebelum menyimpan ke soal_tryout
        if ($materi) {
            // Simpan data ke soal_tryout
            $soalTryout = new SoalTryout();
            $soalTryout->materi_id = $request->materi_id;
            $soalTryout->question_type = $request->question_type;
            // tambahkan atribut lainnya sesuai kebutuhan

            $soalTryout->save();

            return redirect()->route('nama_rute_ke_berhasil')->with('success', 'Soal Tryout berhasil disimpan.');
        } else {
            // Tampilkan pesan atau lakukan aksi lain jika materi tidak ditemukan
            return redirect()->back()->with('error', 'Materi tidak valid.');
        }
    }
}

