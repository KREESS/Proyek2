<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Soal Tryout</title>
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('admin.tambah_soal_tryout') }}" class="btn btn-primary btn-outline-dark hover-effect">Tambah Soal</a>
        </div>

        <h2>Daftar Soal Tryout</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center align-middle justify-content-center">
                        <th scope="col">No</th>
                        <th scope="col">Question Type</th>
                        <th scope="col">TPS Type</th>
                        <th scope="col">Penalaran Type TPS</th>
                        <th scope="col">Topik Soal TPS</th>
                        <th scope="col">TL Type</th>
                        <th scope="col">Topik Soal TL</th>
                        <th scope="col">Question</th>
                        <th scope="col">Option A</th>
                        <th scope="col">Option B</th>
                        <th scope="col">Option C</th>
                        <th scope="col">Option D</th>
                        <th scope="col">Option E</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Penjelasan Jawaban</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soalTryouts as $index => $soalTryout)
                    <tr class="text-center align-middle justify-content-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $soalTryout->question_type }}</td>
                        <td>{{ $soalTryout->tps_type ?? '-' }}</td>
                        <td>{{ $soalTryout->penalaran_type ?? '-'}}</td>
                        <td>{{ $soalTryout->penalaran_induktif_detail ?? 
                                $soalTryout->penalaran_deduktif_detail ?? 
                                $soalTryout->penalaran_kuantitatif_detail ?? 
                                $soalTryout->pemahaman_pemahaman_type ?? 
                                $soalTryout->pemahaman_type ?? 
                                $soalTryout->kuantitatif_type ?? '-' }}
                        </td>
                        <td>{{ $soalTryout->tl_type ?? '-' }}</td>
                        <td>
                            {{ $soalTryout->tl_indonesia_type ?? 
                                $soalTryout->tl_matematika_type ?? 
                                $soalTryout->tl_inggris_type ?? '-' }}
                        </td>
                        <td>{{ $soalTryout->question }}</td>
                        <td>{{ $soalTryout->option_a }}</td>
                        <td>{{ $soalTryout->option_b }}</td>
                        <td>{{ $soalTryout->option_c }}</td>
                        <td>{{ $soalTryout->option_d }}</td>
                        <td>{{ $soalTryout->option_e }}</td>
                        <td>{{ $soalTryout->correct_answer }}</td>
                        <td>{{ $soalTryout->answer_explanation }}</td>
                        <td>{{ $soalTryout->created_at }}</td>
                        <td>{{ $soalTryout->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.edit_soal_tryout', $soalTryout->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.delete_soal_tryout', $soalTryout->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br><br><br>
    <!-- Tambahkan Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
