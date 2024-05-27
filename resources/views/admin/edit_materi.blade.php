<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi</title>
    <!-- Tambahkan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan CSS kustom jika diperlukan -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Tampilkan navbar jika ada -->
    @include('layouts.navbar_admin')
    <br><br><br><br>
    <div class="container">
        <h2>Edit Materi</h2>
        <div class="mb-3">
            <p><strong>Question Type:</strong> {{ $materi->question_type1 }}</p>
            <p><strong>Tipe TPS/TL:</strong> {{ $materi->tps_type1 ?? $materi->tl_type1 }}</p>
            <p><strong>Tipe TPS:</strong> {{ $materi->penalaran_type1 ?? '-' }}</p>
            <p><strong>Topik Soal TPS/TL:</strong> {{ $materi->penalaran_induktif_detail1 ?? 
                                                        $materi->penalaran_deduktif_detail1 ?? 
                                                        $materi->penalaran_kuantitatif_detail1 ?? 
                                                        $materi->pemahaman_pemahaman_type1 ?? 
                                                        $materi->pemahaman_type1 ?? 
                                                        $materi->kuantitatif_type1 ?? 
                                                        $materi->tl_indonesia_type1 ?? 
                                                        $materi->tl_matematika_type1 ?? 
                                                        $materi->tl_inggris_type1 ?? '-'}}</p>
        </div>
        <form action="{{ route('admin.update_materi', $materi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $materi->judul }}" required>
            </div>

            <div class="mb-3">
                <label for="isi_materi" class="form-label">Isi Materi</label>
                <textarea class="form-control" id="isi_materi" name="isi_materi" rows="5" required>{{ $materi->isi_materi }}</textarea>
            </div>

            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit" class="btn btn-primary btn-outline-dark hover-effect">Simpan Perubahan</button>
        </form>
    </div>
    <!-- Tambahkan Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
