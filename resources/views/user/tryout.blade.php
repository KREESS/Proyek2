<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout - Pembelajaran dan Tryout Terbaik</title>
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
<div class="container">
    <div class="header">
        <img src="https://via.placeholder.com/100" alt="Logo">
        <h1>Selamat Datang di Panel Tryout</h1>
    </div>
    <p class="description">Siapkan dirimu untuk menghadapi tantangan dan raih kesuksesanmu! Klik tombol di bawah untuk memulai tryout.</p>
    <button type="button" class="btn btn-primary hover-effect" data-bs-toggle="modal" data-bs-target="#rulesModal">
        Mulai Tryout
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="rulesModal" tabindex="-1" aria-labelledby="rulesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rulesModalLabel">Peraturan Tryout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Sebelum memulai tryout, harap perhatikan peraturan berikut:</p>
                <ul>
                    <li>Pastikan Anda telah mempersiapkan diri dengan baik.</li>
                    <li>Jangan menutup atau me-refresh halaman selama tryout berlangsung.</li>
                    <li>Setiap soal memiliki batas waktu tertentu.</li>
                    <li>Waktu total tryout adalah 195 menit.</li>
                    <li>Gunakan waktu dengan bijak dan periksa jawaban Anda sebelum mengirimkan.</li>
                </ul>
                <p>Detail tryout:</p>
                <h3>Tes Potensi Skolastik</h3>
                <ul>
                    <li>Kemampuan Penalaran Umum: 30 soal, 30 menit
                        <ul>
                            <li>Penalaran Induktif: 10 soal, 10 menit</li>
                            <li>Penalaran Deduktif: 10 soal, 10 menit</li>
                            <li>Penalaran Kuantitatif: 10 soal, 10 menit</li>
                        </ul>
                    </li>
                    <li>Pengetahuan dan Pemahaman Umum: 20 soal, 15 menit</li>
                    <li>Kemampuan Memahami Bacaan dan Menulis: 20 soal, 25 menit</li>
                    <li>Pengetahuan Kuantitatif: 20 soal, 20 menit</li>
                    <li>Total waktu TPS: 90 menit</li>
                </ul>
                <h3>Tes Literasi</h3>
                <ul>
                    <li>Literasi dalam Bahasa Indonesia: 30 soal, 37.5 menit</li>
                    <li>Literasi dalam Bahasa Inggris: 20 soal, 30 menit</li>
                    <li>Penalaran Matematika: 20 soal, 37.5 menit</li>
                    <li>Total waktu Tes Literasi: 105 menit</li>
                </ul>
                <h3>Total Waktu Tryout: 195 menit</h3>
            </div>
            <div class="modal-footer">
                <a href="{{ route('tryout.end') }}" id="startTryoutButton" class="btn btn-success">Mulai Tryout</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Membersihkan seluruh localStorage ketika tombol "Mulai Tryout" diklik
        document.getElementById('startTryoutButton').addEventListener('click', function (event) {
            localStorage.clear();
        });
    });
</script>


</body>
</html>