<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Tambahkan Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan CSS kustom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.navbar_admin')
<br><br><br><br>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Kelola FeedBack</h3>
    <div class="table-responsive">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Komentar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $index => $feedback)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $feedback->user->name }}</td>
                        <td>{{ $feedback->user->email }}</td>
                        <td>{{ $feedback->subject }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>
                            <form action="{{ route('admin.delete_feedback', $feedback->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
