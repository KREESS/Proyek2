<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Latihan Soal - Pembelajaran dan Tryout Terbaik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link Icon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Di dalam tag <head> pada file blade Anda -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Local css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-dark font-weight-bold">Detail Soal Latihan</h1>

    @foreach($questions as $index => $data)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="font-weight-bold mb-0">Soal {{ $index + 1 }}</h5>
            </div>
            <div class="card-body" style="text-align: left;"> {{-- Menambah gaya CSS inline untuk rata kiri --}}
                <h5 class="card-title font-weight-bold text-dark">{{ $data['question']->question }}</h5>

                <div class="mt-4">
                    @php
                        $options = ['A', 'B', 'C', 'D', 'E'];
                    @endphp
                    @foreach ($options as $option)
                        @php
                            $optionField = 'option_' . strtolower($option);
                            $isChecked = ($data['jawaban'] === $data['question']->correct_answer && $data['jawaban'] === $data['question']->$optionField);
                            $isCorrect = ($data['jawaban'] === $data['question']->correct_answer);
                            $isWrong = (!$isChecked && $data['jawaban'] === $data['question']->$optionField);
                        @endphp
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="jawaban_{{ $index }}" id="option_{{ strtolower($option) }}_{{ $index }}" value="{{ strtolower($option) }}" {{ $isChecked ? 'checked' : 'disabled' }}>
                            <label class="form-check-label {{ $isChecked ? 'text-success' : ($isWrong ? 'text-danger' : 'text-dark') }}" for="option_{{ strtolower($option) }}_{{ $index }}">
                                <strong>{{ $option }}.</strong> {{ $data['question']->$optionField }}
                                @if ($isChecked)
                                    <i class="fas fa-check-circle text-success ml-2"></i>
                                @elseif ($isWrong)
                                    <i class="fas fa-times-circle text-danger ml-2"></i>
                                @endif
                            </label>
                        </div>
                    @endforeach
                </div>

                <hr class="my-4">

                <p class="mb-2"><strong>Jawaban Anda:</strong> 
                    <span class="{{ $isCorrect ? 'text-success' : 'text-danger' }}">
                        {{ $data['jawaban'] }}
                        @if ($isCorrect)
                            <i class="fas fa-check-circle text-success ml-2"></i>
                        @else
                            <i class="fas fa-times-circle text-danger ml-2"></i>
                        @endif
                    </span>
                </p>
                <p class="mb-2"><strong>Jawaban yang benar:</strong> {{ $data['question']->correct_answer }}</p>
                <p><strong>Penjelasan Jawaban:</strong> {{ $data['question']->answer_explanation }}</p>
            </div>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <a href="{{ route('user.history_soal_latihan') }}" class="btn btn-primary btn-outline-dark hover-effect">Kembali ke Riwayat Tryout</a>
    </div>
</div>
<br><br>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>