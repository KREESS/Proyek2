<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar - Pembelajaran dan Tryout Terbaik</title>
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
    <h1 class="h1-custom">Explorasi Materi UTBK yang Inspiratif</h1>

    <div class="row">
        @foreach ($materis as $materi)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $materi->judul }}</h5>
                    <a href="{{ route('user.materi_show', $materi->id) }}" class="btn btn-dark materi-card-btn mt-auto">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')



    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>