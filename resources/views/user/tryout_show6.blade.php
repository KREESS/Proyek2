<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout Show - Pembelajaran dan Tryout Terbaik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Local css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Tes Literasi: Literasi dalam Bahasa Indonesia</h1>

    {{-- Single Card Display --}}
    <div id="soalContainer" class="card mb-3">
        <div class="card-body position-relative">
            <h5 id="soalTitle" class="card-title text-center">Soal 1</h5>
            <div class="position-absolute top-0 end-0">
                <a id="zoomInButton" href="#" class="btn btn-secondary"><i class="fas fa-search-plus"></i></a>
                <a id="zoomOutButton" href="#" class="btn btn-secondary"><i class="fas fa-search-minus"></i></a>
            </div>
            <div class="mt-3">
                <p id="soalQuestion" class="card-text">{{ $soal_all6[0]->question }}</p>
                <ul class="list-group" id="answerOptions">
                    <li class="list-group-item" data-soal-index="0">
                        <label>
                            <input id="option_a" type="radio" name="answer" value="A" class="answer-option">
                            <span>A. {{ $soal_all6[0]->option_a }}</span>
                        </label>
                    </li>
                    <li class="list-group-item" data-soal-index="1">
                        <label>
                            <input id="option_b" type="radio" name="answer" value="B" class="answer-option">
                            <span>B. {{ $soal_all6[0]->option_b }}</span>
                        </label>
                    </li>
                    <li class="list-group-item" data-soal-index="2">
                        <label>
                            <input id="option_c" type="radio" name="answer" value="C" class="answer-option">
                            <span>C. {{ $soal_all6[0]->option_c }}</span>
                        </label>
                    </li>
                    <li class="list-group-item" data-soal-index="3">
                        <label>
                            <input id="option_d" type="radio" name="answer" value="D" class="answer-option">
                            <span>D. {{ $soal_all6[0]->option_d }}</span>
                        </label>
                    </li>
                    <li class="list-group-item" data-soal-index="4">
                        <label>
                            <input id="option_e" type="radio" name="answer" value="E" class="answer-option">
                            <span>E. {{ $soal_all6[0]->option_e }}</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Navigation buttons --}}
    <div class="text-center mb-5">
        <a id="prevButton" href="#" class="btn btn-primary mr-2" style="display: none;">Sebelumnya</a>
        <button id="raguButton" class="btn btn-warning mr-2">Ragu-Ragu</button>
        <a id="nextButton" href="#" class="btn btn-primary">Selanjutnya</a>
        <a id="finishButton" href="#" class="btn btn-success" style="display: none;">Finish</a>
    </div>

    {{-- List of question numbers --}}
    <div class="text-center">
        <ul class="list-inline" id="questionNumbers">
            @for ($i = 0; $i < count($soal_all6); $i++)
                <li class="list-inline-item" style="margin-right: 5px;">
                    <a href="#" class="question-number btn btn-outline-primary" data-index="{{ $i + 1 }}">{{ $i + 1 }}</a>
                </li>
            @endfor
        </ul>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript untuk menyimpan dan memulihkan urutan soal -->
<script>
    // JavaScript untuk menyimpan dan memulihkan urutan soal
    document.addEventListener('DOMContentLoaded', function () {
        const answerOptions = document.querySelectorAll('.answer-option');
        let currentIndex = 0;
        const soalCount = {!! json_encode(count($soal_all6)) !!}; // Ambil panjang array langsung dari PHP
        let shuffledIndexes = null; // Untuk menyimpan urutan teracak pertama kali

        // Memeriksa apakah urutan soal sudah pernah diacak sebelumnya
        const shuffledIndexesString = localStorage.getItem('shuffledIndexes');
        if (shuffledIndexesString) {
            shuffledIndexes = JSON.parse(shuffledIndexesString);
        } else {
            // Jika belum pernah diacak, buat urutan acak pertama kali
            shuffledIndexes = Array.from({ length: soalCount }, (_, index) => index);
            shuffleArray(shuffledIndexes); // Fungsi untuk mengacak array
            localStorage.setItem('shuffledIndexes', JSON.stringify(shuffledIndexes));
        }

        // Menampilkan soal berdasarkan urutan teracak pertama kali
        function showSoal(index) {
            const shuffledIndex = shuffledIndexes[index]; // Definisikan variabel shuffledIndex di sini
            const currentSoal = {!! json_encode($soal_all6) !!}[shuffledIndex]; // Mengambil data soal dari array yang di-shuffle
            document.getElementById('soalTitle').innerText = `Soal ${index + 1}`;
            document.getElementById('soalQuestion').innerText = currentSoal.question;
            document.getElementById('option_a').nextElementSibling.innerText = `A. ${currentSoal.option_a}`;
            document.getElementById('option_b').nextElementSibling.innerText = `B. ${currentSoal.option_b}`;
            document.getElementById('option_c').nextElementSibling.innerText = `C. ${currentSoal.option_c}`;
            document.getElementById('option_d').nextElementSibling.innerText = `D. ${currentSoal.option_d}`;
            document.getElementById('option_e').nextElementSibling.innerText = `E. ${currentSoal.option_e}`;

            const answerInputs = document.querySelectorAll('.answer-option');
            answerInputs.forEach((input, i) => {
                input.checked = false; // Reset semua pilihan jawaban
            });

            // Tandai jawaban yang benar jika sudah dipilih sebelumnya
            const savedAnswer = localStorage.getItem(`selectedAnswer_${shuffledIndex}`);
            if (savedAnswer) {
                document.querySelector(`input[value="${savedAnswer}"]`).checked = true;
            }

            // Tandai opsi jawaban yang sudah terisi dengan warna hitam
            answerOptions.forEach(option => {
                const liElement = option.parentElement.parentElement;
                const dataSoalIndex = parseInt(liElement.getAttribute('data-soal-index'));
                if (dataSoalIndex === shuffledIndex && option.checked) {
                    liElement.classList.add('bg-black');
                } else {
                    liElement.classList.remove('bg-black');
                }
            });

            // Simpan currentIndex ke local storage
            localStorage.setItem('currentIndex', index);

            // Update tampilan tombol Sebelumnya, Selanjutnya, dan Finish
            if (index > 0) {
                document.getElementById('prevButton').style.display = 'inline-block';
            } else {
                document.getElementById('prevButton').style.display = 'none';
            }
            if (index < soalCount - 1) {
                document.getElementById('nextButton').style.display = 'inline-block';
                document.getElementById('finishButton').style.display = 'none';
            } else {
                document.getElementById('nextButton').style.display = 'none';
                document.getElementById('finishButton').style.display = 'inline-block';
            }

            // Tandai nomor soal yang sedang aktif
            updateQuestionNumberStatus(index);
        }

        // Memulai dengan menampilkan soal pertama
        showSoal(currentIndex);

        // Aksi saat mengklik nomor soal
        document.querySelectorAll('.question-number').forEach((number, i) => {
            number.addEventListener('click', function (event) {
                event.preventDefault();
                currentIndex = i;
                showSoal(currentIndex);
            });
        });

        // Aksi tombol Selanjutnya
        document.getElementById('nextButton').addEventListener('click', function (event) {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % soalCount;
            showSoal(currentIndex);
        });

        // Aksi tombol Sebelumnya
        document.getElementById('prevButton').addEventListener('click', function (event) {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + soalCount) % soalCount;
            showSoal(currentIndex);
        });

        // Event listener untuk tombol selesai
        document.getElementById('finishButton').addEventListener('click', function (event) {
            event.preventDefault();
            // Validasi alert
            if (confirm('Apakah Anda yakin ingin menyelesaikan tes ini? Semua jawaban yang sudah Anda pilih akan dihapus.')) {
                // Menghapus jawaban yang sudah terisi dan status ragu-ragu
                for (let i = 0; i < soalCount; i++) {
                    localStorage.removeItem(`selectedAnswer_${shuffledIndexes[i]}`);
                    localStorage.removeItem(`raguStatus_${shuffledIndexes[i]}`);
                }
                // Membersihkan seluruh localStorage
                localStorage.clear();
                alert('Tes selesai, dan lanjut tes berikutnya.');
                // Mengarahkan ke halaman selanjutnya
                window.location.href = "{{ route('tryout.start7') }}";
            }
        });

        // Aksi saat opsi jawaban berubah
        answerOptions.forEach(option => {
            option.addEventListener('change', function () {
                const shuffledIndex = shuffledIndexes[currentIndex];
                localStorage.setItem(`selectedAnswer_${shuffledIndex}`, this.value);

                // Update tampilan opsi jawaban terisi
                answerOptions.forEach(option => {
                    const liElement = option.parentElement.parentElement;
                    const dataSoalIndex = parseInt(liElement.getAttribute('data-soal-index'));
                    if (dataSoalIndex === shuffledIndex && option.checked) {
                        liElement.classList.add('bg-black');
                    } else {
                        liElement.classList.remove('bg-black');
                    }
                });
            });
        });

        // Aksi saat klik ragu-ragu
        document.getElementById('raguButton').addEventListener('click', function () {
            const shuffledIndex = shuffledIndexes[currentIndex];
            
            // Toggle status ragu-ragu
            const isRagu = localStorage.getItem(`raguStatus_${shuffledIndex}`) === 'true';
            if (isRagu) {
                localStorage.setItem(`raguStatus_${shuffledIndex}`, 'false');
            } else {
                localStorage.setItem(`raguStatus_${shuffledIndex}`, 'true');
            }

            // Tandai nomor soal yang sedang aktif
            updateQuestionNumberStatus(currentIndex);
        });

        // Function to update UI based on saved "ragu-ragu" status
        function updateQuestionNumberStatus(index) {
            document.querySelectorAll('.question-number').forEach((number, i) => {
                const shuffledIndex = shuffledIndexes[i];
                const hasAnswer = localStorage.getItem(`selectedAnswer_${shuffledIndex}`) !== null;
                const isRagu = localStorage.getItem(`raguStatus_${shuffledIndex}`) === 'true';

                if (hasAnswer) {
                    number.classList.add('bg-black');
                } else {
                    number.classList.remove('bg-black');
                }

                if (isRagu) {
                    number.classList.add('bg-yellow'); // Sesuaikan dengan kelas CSS untuk warna kuning
                } else {
                    number.classList.remove('bg-yellow');
                }

                if (i === index) {
                    number.classList.add('btn-primary');
                    number.classList.remove('btn-outline-primary');
                } else {
                    number.classList.remove('btn-primary');
                    number.classList.add('btn-outline-primary');
                }
            });
        }

        // Zoom In Button Action
        document.getElementById('zoomInButton').addEventListener('click', function (event) {
            event.preventDefault();
            const cardBody = document.querySelector('.card-body');
            let currentFontSize = parseFloat(window.getComputedStyle(cardBody).fontSize);
            cardBody.style.fontSize = (currentFontSize + 1) + 'px';
        });

        // Zoom Out Button Action
        document.getElementById('zoomOutButton').addEventListener('click', function (event) {
            event.preventDefault();
            const cardBody = document.querySelector('.card-body');
            let currentFontSize = parseFloat(window.getComputedStyle(cardBody).fontSize);
            cardBody.style.fontSize = (currentFontSize - 1) + 'px';
        });

        // Function to shuffle array
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
    });
</script>



</body>
</html>