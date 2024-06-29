<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Pembelajaran dan Tryout Terbaik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link Icon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Local css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('layouts.navbar_user')

<br><br><br><br>
<div class="container mt-5">
    <h1>{{ $materi->judul }}</h1>
    <p class="materi-content">{!! nl2br(e($materi->isi_materi)) !!}</p>
    <p>Klik tombol di bawah ini untuk memulai mengerjakan soal latihan.</p>
    <button type="button" class="btn btn-dark materi-card-btn mt-auto" data-bs-toggle="modal" data-bs-target="#rulesModal">Mulai Latihan</button>
</div>

<!-- Modal -->
<div class="modal fade" id="rulesModal" tabindex="-1" aria-labelledby="rulesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rulesModalLabel">Peraturan Mengikuti Soal Latihan Online</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Persiapan:</h6>
                <ul>
                    <li>Pastikan perangkat dan koneksi internet stabil.</li>
                    <li>Siapkan alat tulis dan kertas jika perlu.</li>
                    <li>Baca petunjuk soal dengan teliti.</li>
                    <li>Akan diberikan 5 soal latihan.</li>
                    <li>Diberikan waktu 10 menit, waktu terus berjalan.</li>
                </ul>
                <h6>Saat Mengerjakan:</h6>
                <ul>
                    <li>Kerjakan soal dengan jujur dan mandiri.</li>
                    <li>Jangan gunakan bantuan yang tidak diizinkan.</li>
                    <li>Baca soal dengan teliti dan pahami sebelum menjawab.</li>
                    <li>Gunakan waktu dengan bijak.</li>
                </ul>
                <h6>Teknik Menjawab:</h6>
                <ul>
                    <li>Mulailah dari soal yang mudah.</li>
                    <li>Tulis langkah-langkah pengerjaan dengan jelas.</li>
                    <li>Periksa kembali jawaban sebelum mengirim.</li>
                </ul>
                <h6>Masalah Teknis:</h6>
                <ul>
                    <li>Segera laporkan masalah teknis ke admin atau menggunakan fitur feedback.</li>
                    <li>Tetap tenang dan cari solusi terbaik.</li>
                </ul>
                <h6>Setelah Mengerjakan:</h6>
                <ul>
                    <li>Pastikan semua jawaban telah tersimpan atau terkirim dengan benar.</li>
                    <li>Evaluasi diri dan catat bagian yang sulit untuk dipelajari lebih lanjut.</li>
                </ul>
                <p>Dengan mengikuti aturan ini, pengerjaan soal latihan ini dapat berjalan dengan baik. Selamat mengerjakan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ route('user.soal_latihan', ['id' => $materi->id]) }}" class="btn btn-dark" id="btn-mulai-latihan">Mulai Latihan</a>
            </div>
        </div>
    </div>
</div>

<br><br>
@include('layouts.footer')



    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>





</body>
</html>