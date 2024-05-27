<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi</title>
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
            <a href="{{ route('admin.tambah_materi') }}" class="btn btn-primary btn-outline-dark hover-effect">Tambah Materi</a>
        </div>

        <h2>Daftar Materi</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center align-middle justify-content-center">
                        <th scope="col">No</th>
                        <th scope="col">Tipe Pertanyaan</th>
                        <th scope="col">Tipe TPS</th>
                        <th scope="col">Tipe Penalaran</th>
                        <th scope="col">Pemahaman Pemahaman</th>
                        <th scope="col">Tipe Kuantitatif</th>
                        <th scope="col">Tipe TL</th>
                        <th scope="col">Tipe Indonesia</th>
                        <th scope="col">Tipe Matematika</th>
                        <th scope="col">Tipe Inggris</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi Materi</th>
                        <th scope="col">Dibuat pada</th>
                        <th scope="col">Diperbarui pada</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materis as $index => $materi)
                    <tr class="text-center align-middle justify-content-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $materi->question_type1 }}</td>
                        <td>{{ $materi->tps_type1 ?? '-' }}</td>
                        <td>{{ $materi->penalaran_type1 ?? '-' }}</td>
                        <td>{{ $materi->pemahaman_pemahaman_type1 ?? '-' }}</td>
                        <td>{{ $materi->kuantitatif_type1 ?? '-' }}</td>
                        <td>{{ $materi->tl_type1 ?? '-' }}</td>
                        <td>{{ $materi->tl_indonesia_type1 ?? '-' }}</td>
                        <td>{{ $materi->tl_matematika_type1 ?? '-' }}</td>
                        <td>{{ $materi->tl_inggris_type1 ?? '-' }}</td>
                        <td>{{ $materi->judul }}</td>
                        <td>{{ $materi->isi_materi }}</td>
                        <td>{{ $materi->created_at }}</td>
                        <td>{{ $materi->updated_at }}</td>
                        <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.edit_materi', $materi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.delete_materi', $materi->id) }}" method="POST" style="display:inline;">
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

    <!-- Tambahkan Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
