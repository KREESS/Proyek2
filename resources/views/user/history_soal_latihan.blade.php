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
    <!-- Local css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('layouts.navbar_user')

<br><br>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-black font-weight-bold">History Soal Latihan</h1>
    <div class="table-responsive">
        @php
            // Define type titles and their respective section details
            $typeTitles = [
                'penalaran_induktif_detail' => [
                    'category' => 'Tes Potensi Skolastik: Kemampuan Penalaran Umum',
                    'title' => 'Penalaran Induktif'
                ],
                'penalaran_deduktif_detail' => [
                    'category' => 'Tes Potensi Skolastik: Kemampuan Penalaran Umum',
                    'title' => 'Penalaran Deduktif'
                ],
                'penalaran_kuantitatif_detail' => [
                    'category' => 'Tes Potensi Skolastik: Kemampuan Penalaran Umum',
                    'title' => 'Penalaran Kuantitatif'
                ],
                'pemahaman_pemahaman_type' => [
                    'category' => 'Tes Literasi: Pengetahuan dan Pemahaman Umum',
                    'title' => 'Pengetahuan dan Pemahaman Umum'
                ],
                'pemahaman_type' => [
                    'category' => 'Tes Potensi Skolastik',
                    'title' => 'Kemampuan Memahami Bacaan dan Menulis'
                ],
                'kuantitatif_type' => [
                    'category' => 'Tes Potensi Skolastik',
                    'title' => 'Pengetahuan Kuantitatif'
                ],
                'tl_indonesia_type' => [
                    'category' => 'Tes Literasi',
                    'title' => 'Literasi dalam Bahasa Indonesia'
                ],
                'tl_matematika_type' => [
                    'category' => 'Tes Literasi',
                    'title' => 'Penalaran Matematika'
                ],
                'tl_inggris_type' => [
                    'category' => 'Tes Literasi',
                    'title' => 'Literasi dalam Bahasa Inggris'
                ],
            ];
        @endphp

        @foreach ($typeTitles as $type => $detail)
            @php
                $sections = collect();
                
                // Collect unique sections from user answers
                $userAnswers->each(function($answer) use ($type, $sections) {
                    for ($i = 1; $i <= 5; $i++) {
                        $soalTryout = 'soalTryout' . $i;
                        if ($answer->$soalTryout && $answer->$soalTryout->$type) {
                            $sections->push($answer->$soalTryout->$type);
                        }
                    }
                });

                $sections = $sections->unique();
            @endphp

            @foreach ($sections as $sectionName)
                <h5 class="text-center mb-3">{{ $detail['category'] }}: {{ $detail['title'] }} - {{ $sectionName }}</h5>
                @php
                    // Filter user answers by section and type
                    $filteredAnswers = $userAnswers->filter(function($answer) use ($type, $sectionName) {
                        return ($answer->soalTryout1 && $answer->soalTryout1->$type === $sectionName) ||
                               ($answer->soalTryout2 && $answer->soalTryout2->$type === $sectionName) ||
                               ($answer->soalTryout3 && $answer->soalTryout3->$type === $sectionName) ||
                               ($answer->soalTryout4 && $answer->soalTryout4->$type === $sectionName) ||
                               ($answer->soalTryout5 && $answer->soalTryout5->$type === $sectionName);
                    });
                @endphp
                @if ($filteredAnswers->isEmpty())
                    <p class="text-center text-muted">No data available for {{ $detail['title'] }} - {{ $sectionName }}</p>
                @else
                    <table class="table table-striped table-bordered table-hover shadow">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Jawaban Benar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filteredAnswers as $userAnswer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userAnswer->correctCount }} / 5</td>
                                    <td>
                                        <a href="{{ route('user.history_soal_detail', ['id' => $userAnswer->id, 'jawaban' => $userAnswer->jawaban1]) }}" class="btn btn-primary btn-outline-dark hover-effect">Detail</a>
                                        <!-- Ganti 'jawaban1' sesuai dengan jawaban yang sesuai dengan urutan soal yang ingin ditampilkan -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br><br><br>
                @endif
            @endforeach
        @endforeach
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