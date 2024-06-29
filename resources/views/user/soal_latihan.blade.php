<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Latihan - Pembelajaran dan Tryout Terbaik</title>
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

<div class="container mt-5">
    <div id="timer" class="text-right mb-3">Waktu habis</div>
    <br>
    <h1 class="text-center">Soal Latihan - {{ $materi->judul }}</h1>
    <br><br>
    <form id="latihanForm" method="POST" action="{{ route('user.finish', ['materi_id' => $materi_id]) }}">
    @csrf
    @foreach($soalTryouts as $index => $soal)
        <div class="mb-4">
            <h5>{{ $index + 1 }}. {!! nl2br(e($soal->question)) !!}</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban[{{ $index + 1 }}][jawaban]" id="jawaban{{ $index + 1 }}A" value="A">
                <label class="form-check-label" for="jawaban{{ $index + 1 }}A">A. {{ $soal->option_a }}</label>
                <input type="hidden" name="jawaban[{{ $index + 1 }}][soal_tryout_id]" value="{{ $soal->id }}">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban[{{ $index + 1 }}][jawaban]" id="jawaban{{ $index + 1 }}B" value="B">
                <label class="form-check-label" for="jawaban{{ $index + 1 }}B">B. {{ $soal->option_b }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban[{{ $index + 1 }}][jawaban]" id="jawaban{{ $index + 1 }}C" value="C">
                <label class="form-check-label" for="jawaban{{ $index + 1 }}C">C. {{ $soal->option_c }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban[{{ $index + 1 }}][jawaban]" id="jawaban{{ $index + 1 }}D" value="D">
                <label class="form-check-label" for="jawaban{{ $index + 1 }}D">D. {{ $soal->option_d }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban[{{ $index + 1 }}][jawaban]" id="jawaban{{ $index + 1 }}E" value="E">
                <label class="form-check-label" for="jawaban{{ $index + 1 }}E">E. {{ $soal->option_e }}</label>
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-dark materi-card-btn mt-auto">Kirim Jawaban</button>
</form>

</div>






<br><br>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script untuk mengatur waktu dan menyimpan pilihan -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var timerInterval; // Variabel global untuk menyimpan interval timer
    var timeLimit = 10 * 60 * 1000; // Waktu dalam milidetik untuk 10 menit
    var alertShown = false; // Variabel untuk melacak apakah alert sudah ditampilkan

    // Fungsi untuk memuat waktu dari localStorage atau memulai baru
    function loadTime() {
        var savedStartTime = localStorage.getItem('startTime');
        var savedRemainingTime = localStorage.getItem('remainingTime');

        if (savedStartTime && savedRemainingTime) {
            startTime = parseInt(savedStartTime);
            remainingTime = parseInt(savedRemainingTime);
        } else {
            resetTime();
        }
    }

    // Fungsi untuk mengatur waktu
    function startTimer() {
        function displayTime() {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - startTime;
            remainingTime = timeLimit - elapsedTime;

            if (remainingTime < 0) remainingTime = 0;

            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            document.getElementById('timer').textContent = minutes + ' menit ' + seconds + ' detik';

            if (remainingTime <= 0 && !alertShown) {
                clearInterval(timerInterval);
                document.getElementById('timer').textContent = 'Waktu Habis';

                alertShown = true; // Set alertShown menjadi true agar SweetAlert hanya muncul sekali

                // Tampilkan SweetAlert waktu habis
                Swal.fire({
                    title: 'Waktu Habis!',
                    text: 'Silakan kembali ke halaman latihan soal.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    timer: 5000, // Tutup otomatis setelah 5 detik
                    timerProgressBar: true,
                    didClose: () => {
                        // Setelah SweetAlert ditutup, reset waktu dan kembali ke halaman belajar
                        localStorage.clear(); // Bersihkan localStorage
                        document.getElementById('latihanForm').submit();
                    }
                });
            }
        }

        displayTime();
        timerInterval = setInterval(displayTime, 1000);
    }

    // Fungsi untuk menyimpan pilihan yang dipilih
    function saveSelection() {
        var radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                localStorage.setItem('selectedOption_' + this.name, this.value);
            });
        });

        // Memulihkan pilihan yang dipilih sebelumnya dari localStorage saat halaman dimuat
        radioButtons.forEach(function(radio) {
            var savedValue = localStorage.getItem('selectedOption_' + radio.name);
            if (savedValue === radio.value) {
                radio.checked = true;
            }
        });
    }

    // Simpan waktu mulai dan sisa waktu setiap detik
    function saveTime() {
        localStorage.setItem('startTime', startTime.toString());
        localStorage.setItem('remainingTime', remainingTime.toString());
    }

    // Fungsi untuk reset waktu
    function resetTime() {
        startTime = new Date().getTime();
        remainingTime = timeLimit;
        alertShown = false; // Reset status alert
        saveTime(); // Simpan ulang waktu setelah direset
    }

    // Mulai timer dan memulihkan pilihan saat halaman dimuat
    window.onload = function() {
        loadTime();

        if (remainingTime <= 0) {
            resetTime();
        }

        startTimer();
        saveSelection();

        // Simpan waktu setiap detik
        setInterval(function() {
            saveTime();
        }, 1000);
    };

    // Hentikan interval saat pengguna meninggalkan halaman
    window.onbeforeunload = function() {
        clearInterval(timerInterval);
    };
</script>



</body>
</html>