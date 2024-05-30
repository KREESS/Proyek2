<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal Tryout</title>
    <!-- Tambahkan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan CSS kustom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

@include('layouts.navbar_admin')
<br><br><br><br>
<div class="container">
    <h1>Tambah Soal Tryout</h1>
    <form action="{{ url('/soal-tryout') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question_type" class="form-label">Jenis Soal</label>
            <select class="form-select" id="question_type" name="question_type" onchange="showAdditionalOptions()">
                <option value="">===== Pilih Jenis Soal =====</option>
                <option value="Tes Potensi Skolastik">Tes Potensi Skolastik</option>
                <option value="Tes Literasi">Tes Literasi</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tps_options">
            <label for="tps_type" class="form-label">Pilih Kategori Tes Potensi Skolastik</label>
            <select class="form-select" id="tps_type" name="tps_type" onchange="showAdditionalOptions()">
                <option value="">===== Pilih Kategori Tes Potensi Skolastik =====</option>
                <option value="Kemampuan Penalaran Umum">Kemampuan Penalaran Umum</option>
                <option value="Pengetahuan dan Pemahaman Umum">Pengetahuan dan Pemahaman Umum</option>
                <option value="Kemampuan Memahami Bacaan dan Menulis">Kemampuan Memahami Bacaan dan Menulis</option>
                <option value="Pengetahuan Kuantitatif">Pengetahuan Kuantitatif</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tps_suboptions_penalaran">
            <label for="penalaran_type" class="form-label">Pilih Kategori Kemampuan Penalaran Umum</label>
            <select class="form-select" id="penalaran_type" name="penalaran_type" onchange="showAdditionalOptions()">
                <option value="">===== Pilih Kategori Kemampuan Penalaran Umum =====</option>
                <option value="Penalaran Induktif">Penalaran Induktif</option>
                <option value="Penalaran Deduktif">Penalaran Deduktif</option>
                <option value="Penalaran Kuantitatif">Penalaran Kuantitatif</option>
            </select>
        </div>
        <!-- Opsi untuk Penalaran Induktif -->
        <div class="mb-3 d-none" id="additional_tps_suboptions_penalaran_induktif">
            <label for="penalaran_induktif_detail" class="form-label">Pilih Detail Penalaran Induktif</label>
            <select class="form-select" id="penalaran_induktif_detail" name="penalaran_induktif_detail">
                <option value="">===== Pilih Detail Penalaran Induktif =====</option>
                <option value="Generalisasi">Generalisasi</option>
                <option value="Analogi">Analogi</option>
                <option value="Hubungan kausal">Hubungan kausal</option>
                <option value="Menyangkal anteseden">Menyangkal anteseden</option>
                <option value="Mengafirmasi konsekuensi">Mengafirmasi konsekuensi</option>
            </select>
        </div>

        <!-- Opsi untuk Penalaran Deduktif -->
        <div class="mb-3 d-none" id="additional_tps_suboptions_penalaran_deduktif">
            <label for="penalaran_deduktif_detail" class="form-label">Pilih Detail Penalaran Deduktif</label>
            <select class="form-select" id="penalaran_deduktif_detail" name="penalaran_deduktif_detail">
                <option value="">===== Pilih Detail Penalaran Deduktif =====</option>
                <option value="Silogisme">Silogisme</option>
                <option value="Modus ponens">Modus ponens</option>
                <option value="Modus tollens">Modus tollens</option>
                <option value="Argumen berantai">Argumen berantai</option>
                <option value="Logika matematika">Logika matematika</option>
            </select>
        </div>

        <!-- Opsi untuk Penalaran Kuantitatif -->
        <div class="mb-3 d-none" id="additional_tps_suboptions_penalaran_kuantitatif">
            <label for="penalaran_kuantitatif_detail" class="form-label">Pilih Detail Penalaran Kuantitatif</label>
            <select class="form-select" id="penalaran_kuantitatif_detail" name="penalaran_kuantitatif_detail">
                <option value="">===== Pilih Detail Penalaran Kuantitatif =====</option>
                <option value="Operasi hitung bilangan">Operasi hitung bilangan</option>
                <option value="Baris dan deret angka/huruf">Baris dan deret angka/huruf</option>
                <option value="Bentuk aljabar">Bentuk aljabar</option>
                <option value="Analisis data">Analisis data</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tps_suboptions_pemahaman_pemahaman_umum">
            <label for="pemahaman_pemahaman_type" class="form-label">Pilih Kategori Pengetahuan dan Pemahaman Umum</label>
            <select class="form-select" id="pemahaman_pemahaman_type" name="pemahaman_pemahaman_type">
                <option value="">===== Pilih Kategori Pengetahuan dan Pemahaman Umum =====</option>
                <option value="Mengerti Ide atau Gagasan Utama dari Sebuah Teks">Mengerti Ide atau Gagasan Utama dari Sebuah Teks</option>
                <option value="Memahami Informasi yang Bersifat Detail atau Rincian dalam Teks">Memahami Informasi yang Bersifat Detail atau Rincian dalam Teks</option>
                <option value="Memahami Informasi Tersirat dari Sebuah Teks">Memahami Informasi Tersirat dari Sebuah Teks</option>
                <option value="Memahami Arti Sebuah Kata">Memahami Arti Sebuah Kata</option>
            </select>
        </div>

        <div class="mb-3 d-none" id="additional_tps_suboptions_pemahaman">
            <label for="pemahaman_type" class="form-label">Pilih Kategori Kemampuan Memahami Bacaan dan Menulis</label>
            <select class="form-select" id="pemahaman_type" name="pemahaman_type">
                <option value="">===== Pilih Kategori Kemampuan Memahami Bacaan dan Menulis =====</option>
                <option value="Ide Pokok dan Gagasan Utama">Ide Pokok dan Gagasan Utama</option>
                <option value="Kepaduan Wacana dan Kalimat Efektif">Kepaduan Wacana dan Kalimat Efektif</option>
                <option value="Makna Kata dan Bentuk Kata">Makna Kata dan Bentuk Kata</option>
                <option value="Simpulan dan Inferensi">Simpulan dan Inferensi</option>
                <option value="Ejaan dan Konjungsi">Ejaan dan Konjungsi</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tps_suboptions_kuantitatif">
            <label for="kuantitatif_type" class="form-label">Pilih Kategori Pengetahuan Kuantitatif</label>
            <select class="form-select" id="kuantitatif_type" name="kuantitatif_type">
                <option value="">===== Pilih Kategori Pengetahuan Kuantitatif =====</option>
                <option value="Operasi Aritmatika Dasar">Operasi Aritmatika Dasar</option>
                <option value="Persentase">Persentase</option>
                <option value="Rasio dan Proporsi">Rasio dan Proporsi</option>
                <option value="Persamaan dan Ungkapan Aljabar">Persamaan dan Ungkapan Aljabar</option>
                <option value="Geometri Dasar">Geometri Dasar</option>
                <option value="Statistik dan Probabilitas">Statistik dan Probabilitas</option>
                <option value="Grafik dan Diagram">Grafik dan Diagram</option>
            </select>
        </div>

        <div class="mb-3 d-none" id="additional_tl_options">
            <label for="tl_type" class="form-label">Pilih Kategori Tes Literasi</label>
            <select class="form-select" id="tl_type" name="tl_type" onchange="showAdditionalOptions()">
                <option value="">===== Pilih Kategori Tes Literasi =====</option>
                <option value="Literasi dalam Bahasa Indonesia">Literasi dalam Bahasa Indonesia</option>
                <option value="Literasi dalam Bahasa Inggris">Literasi dalam Bahasa Inggris</option>
                <option value="Penalaran Matematika">Penalaran Matematika</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tl_suboptions_indonesia">
            <label for="tl_indonesia_type" class="form-label">Pilih Subkategori Literasi dalam Bahasa Indonesia</label>
            <select class="form-select" id="tl_indonesia_type" name="tl_indonesia_type">
                <option value="">===== Pilih Subkategori Literasi dalam Bahasa Indonesia =====</option>
                <option value="Pemahaman Teks">Pemahaman Teks</option>
                <option value="Kaidah Bahasa">Kaidah Bahasa</option>
                <option value="Sastra">Sastra</option>
                <option value="Penafsiran Teks">Penafsiran Teks</option>
                <option value="Keterampilan Menulis">Keterampilan Menulis</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tl_suboptions_matematika">
            <label for="tl_matematika_type" class="form-label">Pilih Subkategori Penalaran Matematika</label>
            <select class="form-select" id="tl_matematika_type" name="tl_matematika_type">
                <option value="">===== Pilih Subkategori Penalaran Matematika =====</option>
                <option value="Operasi Aritmatika Dasar">Operasi Aritmatika Dasar</option>
                <option value="Persentase">Persentase</option>
                <option value="Rasio dan Proporsi">Rasio dan Proporsi</option>
                <option value="Persamaan dan Ungkapan Aljabar">Persamaan dan Ungkapan Aljabar</option>
                <option value="Geometri Dasar">Geometri Dasar</option>
                <option value="Statistik dan Probabilitas">Statistik dan Probabilitas</option>
                <option value="Pemecahan Masalah Matematis">Pemecahan Masalah Matematis</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="additional_tl_suboptions_inggris">
            <label for="tl_inggris_type" class="form-label">Pilih Subkategori Literasi dalam Bahasa Inggris</label>
            <select class="form-select" id="tl_inggris_type" name="tl_inggris_type">
                <option value="">===== Pilih Subkategori Literasi dalam Bahasa Inggris =====</option>
                <option value="Pemahaman Teks">Pemahaman Teks</option>
                <option value="Tata Bahasa dan Kosa Kata">Tata Bahasa dan Kosa Kata</option>
                <option value="Sastra">Sastra</option>
                <option value="Analisis Teks">Analisis Teks</option>
                <option value="Keterampilan Menulis">Keterampilan Menulis</option>
            </select>
        </div>



    <div class="mb-3">
        <label for="question" class="form-label">Soal</label>
        <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="option_a" class="form-label">Pilihan A</label>
        <input type="text" class="form-control" id="option_a" name="option_a" required>
    </div>
    <div class="mb-3">
        <label for="option_b" class="form-label">Pilihan B</label>
        <input type="text" class="form-control" id="option_b" name="option_b" required>
    </div>
    <div class="mb-3">
        <label for="option_c" class="form-label">Pilihan C</label>
        <input type="text" class="form-control" id="option_c" name="option_c" required>
    </div>
    <div class="mb-3">
        <label for="option_d" class="form-label">Pilihan D</label>
        <input type="text" class="form-control" id="option_d" name="option_d" required>
    </div>
    <div class="mb-3">
        <label for="option_e" class="form-label">Pilihan E</label>
        <input type="text" class="form-control" id="option_e" name="option_e" required>
    </div>
    <div class="mb-3">
        <label for="correct_answer" class="form-label">Jawaban Benar</label>
        <select class="form-select" id="correct_answer" name="correct_answer" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="answer_explanation" class="form-label">Penjelasan Jawaban</label>
        <textarea class="form-control" id="answer_explanation" name="answer_explanation" rows="3"></textarea>
    </div>
    <button for="nama_tombol" type="submit" class="btn btn-primary btn-outline-dark hover-effect">Simpan Soal</button>
</form>
<br><br>
</div>
<!-- Tambahkan Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function showAdditionalOptions() {
        const questionType = document.getElementById('question_type').value;
        const tpsOptions = document.getElementById('additional_tps_options');
        const tlOptions = document.getElementById('additional_tl_options');
        const tpsSuboptionsPenalaran = document.getElementById('additional_tps_suboptions_penalaran');
        const tpsSuboptionsPemahamanPemahamanUmum = document.getElementById('additional_tps_suboptions_pemahaman_pemahaman_umum');
        const tpsSuboptionsPemahaman = document.getElementById('additional_tps_suboptions_pemahaman');
        const tpsSuboptionsKuantitatif = document.getElementById('additional_tps_suboptions_kuantitatif');
        const tpsSuboptionsPenalaranInduktif = document.getElementById('additional_tps_suboptions_penalaran_induktif');
        const tpsSuboptionsPenalaranDeduktif = document.getElementById('additional_tps_suboptions_penalaran_deduktif');
        const tpsSuboptionsPenalaranKuantitatif = document.getElementById('additional_tps_suboptions_penalaran_kuantitatif');
        const tlSuboptionsIndonesia = document.getElementById('additional_tl_suboptions_indonesia');
        const tlSuboptionsInggris = document.getElementById('additional_tl_suboptions_inggris');
        const tlSuboptionsMatematika = document.getElementById('additional_tl_suboptions_matematika');

        // Hide all sub-options
        tpsOptions.classList.add('d-none');
        tlOptions.classList.add('d-none');
        tpsSuboptionsPenalaran.classList.add('d-none');
        tpsSuboptionsPemahamanPemahamanUmum.classList.add('d-none');
        tpsSuboptionsPemahaman.classList.add('d-none');
        tpsSuboptionsKuantitatif.classList.add('d-none');
        tpsSuboptionsPenalaranInduktif.classList.add('d-none');
        tpsSuboptionsPenalaranDeduktif.classList.add('d-none');
        tpsSuboptionsPenalaranKuantitatif.classList.add('d-none');
        tlSuboptionsIndonesia.classList.add('d-none');
        tlSuboptionsInggris.classList.add('d-none');
        tlSuboptionsMatematika.classList.add('d-none');

        if (questionType === 'Tes Potensi Skolastik') {
            tpsOptions.classList.remove('d-none');

            const tpsType = document.getElementById('tps_type').value;
            if (tpsType === 'Kemampuan Penalaran Umum') {
                tpsSuboptionsPenalaran.classList.remove('d-none');

                const penalaranType = document.getElementById('penalaran_type').value;
                if (penalaranType === 'Penalaran Induktif') {
                    tpsSuboptionsPenalaranInduktif.classList.remove('d-none');
                } else if (penalaranType === 'Penalaran Deduktif') {
                    tpsSuboptionsPenalaranDeduktif.classList.remove('d-none');
                } else if (penalaranType === 'Penalaran Kuantitatif') {
                    tpsSuboptionsPenalaranKuantitatif.classList.remove('d-none');
                }
            } else if (tpsType === 'Pengetahuan dan Pemahaman Umum') {
                tpsSuboptionsPemahamanPemahamanUmum.classList.remove('d-none');
            } else if (tpsType === 'Kemampuan Memahami Bacaan dan Menulis') {
                tpsSuboptionsPemahaman.classList.remove('d-none');
            } else if (tpsType === 'Pengetahuan Kuantitatif') {
                tpsSuboptionsKuantitatif.classList.remove('d-none');
            }
        } else if (questionType === 'Tes Literasi') {
            tlOptions.classList.remove('d-none');
            const tlType = document.getElementById('tl_type').value;
            if (tlType === 'Literasi dalam Bahasa Indonesia') {
                tlSuboptionsIndonesia.classList.remove('d-none');
            } else if (tlType === 'Literasi dalam Bahasa Inggris') {
                tlSuboptionsInggris.classList.remove('d-none');
            } else if (tlType === 'Penalaran Matematika') {
                tlSuboptionsMatematika.classList.remove('d-none');
            }
        }
    }

    // question type changes
    document.getElementById('question_type').addEventListener('change', showAdditionalOptions);
    // TPS type changes
    document.getElementById('tps_type').addEventListener('change', showAdditionalOptions);
    // Penalaran type changes
    document.getElementById('penalaran_type').addEventListener('change', showAdditionalOptions);
    // TL type changes
    document.getElementById('tl_type').addEventListener('change', showAdditionalOptions);

    // Panggil fungsi tersebut pada awalnya untuk menyetel status yang benar berdasarkan nilai awal
    document.addEventListener("DOMContentLoaded", showAdditionalOptions);


    document.getElementById('nama_tombol').addEventListener('click', function() {
        // Panggil fungsi atau tambahkan logika lain yang diperlukan ketika tombol diklik
        showAdditionalOptions();
    });

</script>







</body>
</html>
