<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\SoalTryout;
use App\Models\Materi;
use App\Models\Feedback;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 'user') {
                return redirect()->route('dashboard'); // Redirect regular users to dashboard
            } elseif ($user->usertype == 'admin') {
                return view('admin.index'); // Show admin dashboard
            }
        }
        // If not logged in or invalid user type, redirect to login page
        return redirect()->route('login');

        $soalTryouts = SoalTryout::all(); // Ambil semua data soal dari database
        return view('admin.kelola_soal_tryout', ['soalTryouts' => $soalTryouts]);
    }

    public function historyTryout()
    {
        // Lakukan logika yang diperlukan, misalnya mengambil data dari model
        $data = []; // Misalnya, data yang akan ditampilkan dalam view

        // Tampilkan view history_tryout.blade.php dengan data yang sudah diambil
        return view('admin.history_tryout', compact('data'));
    }

    public function kelolaMateri()
    {
        // Mengambil data materi dari database
        $materis = Materi::all();

        // Mengarahkan ke halaman tambah materi sambil mengirimkan data materi
        return view('admin.kelola_materi', compact('materis'));
    }

    public function kelolaSoalTryout()
    {
        $soalTryouts = SoalTryout::all(); // Ambil semua data soal tryout dari database
        return view('admin.kelola_soal_tryout', ['soalTryouts' => $soalTryouts]);
    }

    public function kelolaFeedback()
    {
        $feedbacks = Feedback::with('user')->get();
        return view('admin.kelola_feedback', compact('feedbacks'));
    }

    public function tambahSoal()
    {
        return view('admin.tambah_soal_tryout'); // Pastikan Anda memiliki view 'tambah_soal'
    }

    public function editSoalTryout($id)
    {
        $soalTryout = SoalTryout::findOrFail($id);
        return view('admin.edit_soal_tryout', compact('soalTryout'));
    }

    public function updateSoalTryout(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'correct_answer' => 'required',
            'answer_explanation' => 'required',
            // tambahkan aturan validasi untuk bidang lainnya sesuai kebutuhan Anda
        ]);

        try {
            // Cari data SoalTryout berdasarkan ID
            $soalTryout = SoalTryout::findOrFail($id);

            // Perbarui data SoalTryout
            $soalTryout->update($validatedData);

            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('admin.kelola_soal_tryout')->with('success', 'Soal berhasil diperbarui');
        } catch (\Throwable $th) {
            // Tangani kesalahan jika data tidak ditemukan atau terjadi kesalahan lainnya
            return redirect()->route('admin.kelola_soal_tryout')->with('error', 'Gagal memperbarui soal. Silakan coba lagi.');
        }
    }



    public function deleteSoalTryout($id)
    {
        $soalTryout = SoalTryout::findOrFail($id);
        $soalTryout->delete();
        return redirect()->route('admin.kelola_soal_tryout')->with('success', 'Soal berhasil dihapus');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'question_type' => 'required',
            'tps_type' => 'nullable',
            'penalaran_type' => 'nullable',
            'penalaran_induktif_detail' => 'nullable',
            'penalaran_deduktif_detail' => 'nullable',
            'penalaran_kuantitatif_detail' => 'nullable',
            'pemahaman_pemahaman_type' => 'nullable',
            'pemahaman_type' => 'nullable',
            'kuantitatif_type' => 'nullable',
            'tl_type' => 'nullable',
            'tl_indonesia_type' => 'nullable',
            'tl_matematika_type' => 'nullable',
            'tl_inggris_type' => 'nullable',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'correct_answer' => 'required',
            'answer_explanation' => 'required',
        ]);

        // Simpan data ke database
        SoalTryout::create($validatedData);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('admin.kelola_soal_tryout')->with('success', 'Soal tryout berhasil disimpan.');
    }

    public function tambahMateri()
    {
        return view('admin.tambah_materi');
    }

    public function materi(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData1 = $request->validate([
            'question_type1' => 'required',
            'tps_type1' => 'nullable',
            'penalaran_type1' => 'nullable',
            'penalaran_induktif_detail1' => 'nullable',
            'penalaran_deduktif_detail1' => 'nullable',
            'penalaran_kuantitatif_detail1' => 'nullable',
            'pemahaman_pemahaman_type1' => 'nullable',
            'pemahaman_type1' => 'nullable',
            'kuantitatif_type1' => 'nullable',
            'tl_type1' => 'nullable',
            'tl_indonesia_type1' => 'nullable',
            'tl_matematika_type1' => 'nullable',
            'tl_inggris_type1' => 'nullable',
            'judul' => 'required',
            'isi_materi' => 'required',
        ]);

        // Simpan data ke database
        Materi::create($validatedData1);

        // Redirect ke halaman kelola_materi dengan pesan sukses
        return redirect()->route('admin.kelola_materi')->with('success', 'Materi berhasil disimpan.');
    }

    public function editMateri($id)
    {
        // Ambil data materi berdasarkan ID
        $materi = Materi::find($id);

        // Kirim data materi ke view edit_materi.blade.php
        return view('admin.edit_materi', compact('materi'));
    }

    public function deleteMateri($id)
    {
        // Temukan materi berdasarkan ID
        $materi = Materi::find($id);

        // Hapus materi
        $materi->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Materi berhasil dihapus.');
    }

    public function updateMateri(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi_materi' => 'required',
        ]);

        // Temukan materi yang akan diperbarui berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Update data materi
        $materi->update($validatedData);

        // Redirect ke halaman kelola_materi dengan pesan sukses
        return redirect()->route('admin.kelola_materi')->with('success', 'Materi berhasil diperbarui.');
    }

    public function deleteFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback berhasil dihapus');
    }
}
