<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalTryout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TryoutController extends Controller
{
    public function start()
    {
    // Gunakan session key yang unik untuk setiap pengguna dan materi
    $sessionKey = 'soal_tryouts_' . Auth::id();
    $firstAccessKey = 'first_access_' . Auth::id();

    // Ambil urutan soal dari session jika sudah ada
    if (Session::has($sessionKey)) {
        $soal_all = Session::get($sessionKey);
    } else {
        $soal_penalaran_induktif_generalisasi = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Induktif')
            ->where('penalaran_induktif_detail', 'Generalisasi')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_induktif_analogi = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Induktif')
            ->where('penalaran_induktif_detail', 'Analogi')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_induktif_hubungan_kausal = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Induktif')
            ->where('penalaran_induktif_detail', 'Hubungan kausal')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_induktif_menyangkal_anteseden = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Induktif')
            ->where('penalaran_induktif_detail', 'Menyangkal anteseden')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_induktif_mengafirmasi_konsekuensi = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Induktif')
            ->where('penalaran_induktif_detail', 'Mengafirmasi konsekuensi')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_deduktif_silogisme = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Deduktif')
            ->where('penalaran_deduktif_detail', 'Silogisme')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_deduktif_modus_ponens = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Deduktif')
            ->where('penalaran_deduktif_detail', 'Modus ponens')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_deduktif_modus_tollens = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Deduktif')
            ->where('penalaran_deduktif_detail', 'Modus tollens')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_deduktif_argumen_berantai = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Deduktif')
            ->where('penalaran_deduktif_detail', 'Argumen berantai')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_deduktif_logika_matematika = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Deduktif')
            ->where('penalaran_deduktif_detail', 'Logika matematika')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_kuantitatif_operasi_hitung = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Kuantitatif')
            ->where('penalaran_kuantitatif_detail', 'Operasi hitung bilangan')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_kuantitatif_baris_deret = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Kuantitatif')
            ->where('penalaran_kuantitatif_detail', 'Baris dan deret angka/huruf')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_kuantitatif_bentuk_aljabar = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Kuantitatif')
            ->where('penalaran_kuantitatif_detail', 'Bentuk aljabar')
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $soal_penalaran_kuantitatif_analisis_data = SoalTryout::where('tps_type', 'Kemampuan Penalaran Umum')
            ->where('penalaran_type', 'Penalaran Kuantitatif')
            ->where('penalaran_kuantitatif_detail', 'Analisis data')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Merge all collections
        $soal_all = $soal_penalaran_induktif_generalisasi
            ->merge($soal_penalaran_induktif_analogi)
            ->merge($soal_penalaran_induktif_hubungan_kausal)
            ->merge($soal_penalaran_induktif_menyangkal_anteseden)
            ->merge($soal_penalaran_induktif_mengafirmasi_konsekuensi)
            ->merge($soal_penalaran_deduktif_silogisme)
            ->merge($soal_penalaran_deduktif_modus_ponens)
            ->merge($soal_penalaran_deduktif_modus_tollens)
            ->merge($soal_penalaran_deduktif_argumen_berantai)
            ->merge($soal_penalaran_deduktif_logika_matematika)
            ->merge($soal_penalaran_kuantitatif_operasi_hitung)
            ->merge($soal_penalaran_kuantitatif_baris_deret)
            ->merge($soal_penalaran_kuantitatif_bentuk_aljabar)
            ->merge($soal_penalaran_kuantitatif_analisis_data)
            ->unique('id')
            ->shuffle();

        // Shuffle the collection
        $soal_all = $soal_all->shuffle();

        // Limit the number of questions to 30
        $soal_all = $soal_all->take(30);

        // Simpan urutan soal ke dalam session
        Session::put($sessionKey, $soal_all);
        // Tandai bahwa pengguna telah mengakses soal pertama kali
        Session::put($firstAccessKey, true);
    }
        return view('user.tryout_show', compact('soal_all'));
    }

    public function end()
    {
        // Gunakan session key yang unik untuk setiap pengguna dan materi
        $sessionKey = 'soal_tryouts_' . Auth::id();
        $firstAccessKey = 'first_access12_' . Auth::id();
        

        // Membersihkan session jika sudah ada
        Session::forget($sessionKey);
        // Tandai bahwa pengguna telah mengakses soal pertama kali
        Session::put($firstAccessKey, true);

        // Membersihkan cache jika sudah ada
        Cache::forget($sessionKey);

        return redirect()->route('tryout.start')->withInput(); // Redirect ke halaman awal ujian
    }

    public function start2()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts2_' . Auth::id();
        $firstAccessKey = 'first_access3_' . Auth::id();

        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey)) {
            $soal_all2 = Session::get($sessionKey);
        } else {
            $soal_ide_gagasan_utama = SoalTryout::where('tps_type', 'Pengetahuan dan Pemahaman Umum')
            ->where('pemahaman_pemahaman_type', 'Mengerti Ide atau Gagasan Utama dari Sebuah Teks')
            ->inRandomOrder()
            ->limit(5)
            ->get();

            $soal_informasi_detail = SoalTryout::where('tps_type', 'Pengetahuan dan Pemahaman Umum')
            ->where('pemahaman_pemahaman_type', 'Memahami Informasi yang Bersifat Detail atau Rincian dalam Teks')
            ->inRandomOrder()
            ->limit(5)
            ->get();

            $soal_informasi_tersirat = SoalTryout::where('tps_type', 'Pengetahuan dan Pemahaman Umum')
            ->where('pemahaman_pemahaman_type', 'Memahami Informasi Tersirat dari Sebuah Teks')
            ->inRandomOrder()
            ->limit(5)
            ->get();

            $soal_arti_kata = SoalTryout::where('tps_type', 'Pengetahuan dan Pemahaman Umum')
            ->where('pemahaman_pemahaman_type', 'Memahami Arti Sebuah Kata')
            ->inRandomOrder()
            ->limit(5)
            ->get();

            // Merge all collections
            $soal_all2 = $soal_ide_gagasan_utama
            ->merge($soal_informasi_detail)
            ->merge($soal_informasi_tersirat)
            ->merge($soal_arti_kata)
            ->unique('id')
            ->shuffle();

            // Shuffle the collection
            $soal_all2 = $soal_all2->shuffle();

            // Limit the number of questions to 20
            $soal_all2 = $soal_all2->take(20); // Take only 20 questions

            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all2);
            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }

        // Ambil kembali 20 soal dari session jika tidak ada yang disimpan
        if (!$soal_all2 || $soal_all2->isEmpty()) {
            // Jika tidak ada soal yang tersedia, atur untuk menampilkan pesan yang sesuai
            $soal_all2 = collect([]);
        }

        // Batasi jumlah soal jika lebih dari 20
        $soal_all2 = $soal_all2->slice(0, 20);

        return view('user.tryout_show2', compact('soal_all2'));
    }

    public function start3()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts3_' . Auth::id();
        $firstAccessKey = 'first_access3_' . Auth::id();

        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey)) {
            $soal_all3 = Session::get($sessionKey);
        } else {
            $ide_pokok_gagasan_utama = SoalTryout::where('tps_type', 'Kemampuan Memahami Bacaan dan Menulis')
            ->where('pemahaman_type', 'Ide Pokok dan Gagasan Utama')
            ->inRandomOrder()
            ->limit(4) // Limit to 3-4 questions
            ->get();

            $kepaduan_wacana_kalimat_efektif = SoalTryout::where('tps_type', 'Kemampuan Memahami Bacaan dan Menulis')
            ->where('pemahaman_type', 'Kepaduan Wacana dan Kalimat Efektif')
            ->inRandomOrder()
            ->limit(4) // Limit to 3-4 questions
            ->get();

            $makna_kata_bentuk_kata = SoalTryout::where('tps_type', 'Kemampuan Memahami Bacaan dan Menulis')
            ->where('pemahaman_type', 'Makna Kata dan Bentuk Kata')
            ->inRandomOrder()
            ->limit(4) // Limit to 3 questions
            ->get();

            $simpul_inferensi = SoalTryout::where('tps_type', 'Kemampuan Memahami Bacaan dan Menulis')
            ->where('pemahaman_type', 'Simpulan dan Inferensi')
            ->inRandomOrder()
            ->limit(4) // Limit to 3-4 questions
            ->get();

            $ejaan_konjungsi = SoalTryout::where('tps_type', 'Kemampuan Memahami Bacaan dan Menulis')
            ->where('pemahaman_type', 'Ejaan dan Konjungsi')
            ->inRandomOrder()
            ->limit(4) // Limit to 3 questions
            ->get();

            // Merge all collections
            $soal_all3 = $ide_pokok_gagasan_utama
            ->merge($kepaduan_wacana_kalimat_efektif)
            ->merge($makna_kata_bentuk_kata)
            ->merge($simpul_inferensi)
            ->merge($ejaan_konjungsi)
            ->unique('id')
            ->shuffle();

            // Shuffle the collection
            $soal_all3 = $soal_all3->shuffle();

            // Limit the number of questions to 20
            $soal_all3 = $soal_all3->take(20); // Take only 20 questions

            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all3);

            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }

        // Ambil kembali 20 soal dari session jika tidak ada yang disimpan
        if (!$soal_all3 || $soal_all3->isEmpty()) {
            // Jika tidak ada soal yang tersedia, atur untuk menampilkan pesan yang sesuai
            $soal_all3 = collect([]);
        }

        // Batasi jumlah soal jika lebih dari 20 (meskipun seharusnya tidak perlu)
        $soal_all3 = $soal_all3->slice(0, 20);

        return view('user.tryout_show3', compact('soal_all3'));
    }

    public function start5()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts5_' . Auth::id();
        $firstAccessKey = 'first_access5_' . Auth::id();
    
        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey) && Session::has($firstAccessKey)) {
            $soal_all5 = Session::get($sessionKey);
        } else {
            // Ambil semua jenis soal dari database dengan jumlah yang ditentukan
            $operasi_aritmatika_dasar1 = SoalTryout::where('kuantitatif_type', 'Operasi Aritmatika Dasar')
                ->inRandomOrder()
                ->limit(4)
                ->get();
    
            $persentase1 = SoalTryout::where('kuantitatif_type', 'Persentase')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $rasio_proporsi1 = SoalTryout::where('kuantitatif_type', 'Rasio dan Proporsi')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $persamaan_ungkapan_aljabar1 = SoalTryout::where('kuantitatif_type', 'Persamaan dan Ungkapan Aljabar')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $geometri_dasar1 = SoalTryout::where('kuantitatif_type', 'Geometri Dasar')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $statistik_probabilitas1 = SoalTryout::where('kuantitatif_type', 'Statistik dan Probabilitas')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $grafik_diagram1 = SoalTryout::where('kuantitatif_type', 'Grafik dan Diagram')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            // Gabungkan semua koleksi soal dan shuffle
            $soal_all5 = $operasi_aritmatika_dasar1
                ->concat($persentase1)
                ->concat($rasio_proporsi1)
                ->concat($persamaan_ungkapan_aljabar1)
                ->concat($geometri_dasar1)
                ->concat($statistik_probabilitas1)
                ->concat($grafik_diagram1)
                ->unique('id')
                ->shuffle();
    
            // Ambil 20 soal dari koleksi yang diacak
            $soal_all5 = $soal_all5->take(20);
    
            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all5);
    
            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }
    
        // Tampilkan view dengan soal yang sudah diambil
        return view('user.tryout_show5', compact('soal_all5'));
    }
    
    public function start6()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts6_' . Auth::id();
        $firstAccessKey = 'first_access6_' . Auth::id();
    
        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey) && Session::has($firstAccessKey)) {
            $soal_all6 = Session::get($sessionKey);
        } else {
            // Ambil semua jenis soal dari database dengan jumlah yang ditentukan
            $pemahaman_teks1 = SoalTryout::where('tl_indonesia_type', 'Pemahaman Teks')
                ->inRandomOrder()
                ->limit(8)
                ->get();
    
            $kaidah_bahasa1 = SoalTryout::where('tl_indonesia_type', 'Kaidah Bahasa')
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $sastra1 = SoalTryout::where('tl_indonesia_type', 'Sastra')
                ->inRandomOrder()
                ->limit(5)
                ->get();
    
            $penafsiran_teks1 = SoalTryout::where('tl_indonesia_type', 'Penafsiran Teks')
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $keterampilan_menulis1 = SoalTryout::where('tl_indonesia_type', 'Keterampilan Menulis')
                ->inRandomOrder()
                ->limit(5)
                ->get();
    
            // Gabungkan semua koleksi soal dan shuffle
            $soal_all6 = $pemahaman_teks1
                ->concat($kaidah_bahasa1)
                ->concat($sastra1)
                ->concat($penafsiran_teks1)
                ->concat($keterampilan_menulis1)
                ->unique('id')
                ->shuffle();
    
            // Ambil 20 soal dari koleksi yang diacak
            $soal_all6 = $soal_all6->take(30);
    
            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all6);
    
            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }
    
        // Tampilkan view dengan soal yang sudah diambil
        return view('user.tryout_show6', compact('soal_all6'));
    }

    public function start7()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts7_' . Auth::id();
        $firstAccessKey = 'first_access7_' . Auth::id();
    
        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey) && Session::has($firstAccessKey)) {
            $soal_all7 = Session::get($sessionKey);
        } else {
            // Ambil semua jenis soal dari database dengan jumlah yang ditentukan
            $pemahaman_teks2 = SoalTryout::where('tl_inggris_type', 'Pemahaman Teks')
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $tata_bahasa_kosa_kata2 = SoalTryout::where('tl_inggris_type', 'Tata Bahasa dan Kosa Kata')
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $sastra2 = SoalTryout::where('tl_inggris_type', 'Sastra')
                ->inRandomOrder()
                ->limit(5)
                ->get();
    
            $analisis_teks2 = SoalTryout::where('tl_inggris_type', 'Analisis Teks')
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            $keterampilan_menulis2 = SoalTryout::where('tl_inggris_type', 'Keterampilan Menulis')
                ->inRandomOrder()
                ->limit(5)
                ->get();
    
            // Gabungkan semua koleksi soal dan shuffle
            $soal_all7 = $pemahaman_teks2
                ->concat($tata_bahasa_kosa_kata2)
                ->concat($sastra2)
                ->concat($analisis_teks2)
                ->concat($keterampilan_menulis2)
                ->unique('id')
                ->shuffle();
    
            // Ambil 20 soal dari koleksi yang diacak
            $soal_all7 = $soal_all7->take(20);
    
            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all7);
    
            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }
    
        // Tampilkan view dengan soal yang sudah diambil
        return view('user.tryout_show7', compact('soal_all7'));
    }

    public function start8()
    {
        // Gunakan session key yang unik untuk setiap pengguna
        $sessionKey = 'soal_tryouts8_' . Auth::id();
        $firstAccessKey = 'first_access8_' . Auth::id();
    
        // Ambil urutan soal dari session jika sudah ada
        if (Session::has($sessionKey) && Session::has($firstAccessKey)) {
            $soal_all8 = Session::get($sessionKey);
        } else {
            // Ambil semua jenis soal dari database dengan jumlah yang ditentukan
            $operasi_aritmatika_dasar2 = SoalTryout::where('tl_matematika_type', 'Operasi Aritmatika Dasar')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $persentase2 = SoalTryout::where('tl_matematika_type', 'Persentase')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $rasio_proporsi2 = SoalTryout::where('tl_matematika_type', 'Rasio dan Proporsi')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $persamaan_ungkapan_aljabar2 = SoalTryout::where('tl_matematika_type', 'Persamaan dan Ungkapan Aljabar')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            $geometri_dasar2 = SoalTryout::where('tl_matematika_type', 'Geometri Dasar')
                ->inRandomOrder()
                ->limit(3)
                ->get();

            $statistik_probabilitas2 = SoalTryout::where('tl_matematika_type', 'Statistik dan Probabilitas')
                ->inRandomOrder()
                ->limit(2)
                ->get();

            $pemecahan_masalah_matematis2 = SoalTryout::where('tl_matematika_type', 'Pemecahan Masalah Matematis')
                ->inRandomOrder()
                ->limit(3)
                ->get();
    
            // Gabungkan semua koleksi soal dan shuffle
            $soal_all8 = $operasi_aritmatika_dasar2
                ->concat($persentase2)
                ->concat($rasio_proporsi2)
                ->concat($persamaan_ungkapan_aljabar2)
                ->concat($geometri_dasar2)
                ->concat($statistik_probabilitas2)
                ->concat($pemecahan_masalah_matematis2)
                ->unique('id')
                ->shuffle();
    
            // Ambil 20 soal dari koleksi yang diacak
            $soal_all8 = $soal_all8->take(20);
    
            // Simpan urutan soal ke dalam session
            Session::put($sessionKey, $soal_all8);
    
            // Tandai bahwa pengguna telah mengakses soal pertama kali
            Session::put($firstAccessKey, true);
        }
    
        // Tampilkan view dengan soal yang sudah diambil
        return view('user.tryout_show8', compact('soal_all8'));
    }
}