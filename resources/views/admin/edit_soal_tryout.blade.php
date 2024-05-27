<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Soal Tryout</title>
    <!-- Tambahkan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar_admin')
    <br><br>
<div class="container mt-5">
    <h2>Edit Soal Tryout</h2>
    <div class="mb-3">
        <p><strong>Question Type:</strong> {{ $soalTryout->question_type }}</p>
        <p><strong>Tipe TPS/TL:</strong> {{ $soalTryout->tps_type ?? $soalTryout->tl_type }}</p>
        <p><strong>Tipe TPS:</strong> {{ $soalTryout->penalaran_type ?? '-' }}</p>
        <p><strong>Topik Soal TPS/TL:</strong> {{ $soalTryout->penalaran_induktif_detail ?? 
                                                    $soalTryout->penalaran_deduktif_detail ?? 
                                                    $soalTryout->penalaran_kuantitatif_detail ?? 
                                                    $soalTryout->pemahaman_pemahaman_type ?? 
                                                    $soalTryout->pemahaman_type ?? 
                                                    $soalTryout->kuantitatif_type ?? 
                                                    $soalTryout->tl_indonesia_type ?? 
                                                    $soalTryout->tl_matematika_type ?? 
                                                    $soalTryout->tl_inggris_type ?? '-'}}</p>
    </div>
    <form action="{{ route('admin.update_soal_tryout', $soalTryout->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question" class="form-label">Pertanyaan</label>
            <textarea class="form-control" id="question" name="question" rows="3" required>{{ $soalTryout->question }}</textarea>
        </div>

        <div class="mb-3">
            <label for="option_a" class="form-label">Option A</label>
            <input type="text" class="form-control" id="option_a" name="option_a" value="{{ $soalTryout->option_a }}" required>
        </div>

        <div class="mb-3">
            <label for="option_b" class="form-label">Option B</label>
            <input type="text" class="form-control" id="option_b" name="option_b" value="{{ $soalTryout->option_b }}" required>
        </div>

        <div class="mb-3">
            <label for="option_c" class="form-label">Option C</label>
            <input type="text" class="form-control" id="option_c" name="option_c" value="{{ $soalTryout->option_c }}" required>
        </div>

        <div class="mb-3">
            <label for="option_d" class="form-label">Option D</label>
            <input type="text" class="form-control" id="option_d" name="option_d" value="{{ $soalTryout->option_d }}" required>
        </div>

        <div class="mb-3">
            <label for="option_e" class="form-label">Option E</label>
            <input type="text" class="form-control" id="option_e" name="option_e" value="{{ $soalTryout->option_e }}" required>
        </div>

        <div class="mb-3">
            <label for="correct_answer" class="form-label">Jawaban Benar</label>
            <select class="form-select" id="correct_answer" name="correct_answer" required>
                <option value="A" @if($soalTryout->correct_answer === 'A') selected @endif>A</option>
                <option value="B" @if($soalTryout->correct_answer === 'B') selected @endif>B</option>
                <option value="C" @if($soalTryout->correct_answer === 'C') selected @endif>C</option>
                <option value="D" @if($soalTryout->correct_answer === 'D') selected @endif>D</option>
                <option value="E" @if($soalTryout->correct_answer === 'E') selected @endif>E</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="answer_explanation" class="form-label">Penjelasan Jawaban</label>
            <textarea class="form-control" id="answer_explanation" name="answer_explanation" rows="3" required>{{ $soalTryout->answer_explanation }}</textarea>
        </div>

        <!-- Tombol untuk menyimpan perubahan -->
        <button type="submit" class="btn btn-primary btn-outline-dark hover-effect">Simpan Perubahan</button>
        <br><br><br><br>
    </form>
</div>


</body>
</html>
