<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNBT - Pembelajaran dan Tryout Terbaik</title>
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
@include('layouts.navbar')


<main>
{{-- Bagian Selamat Datang --}}
    <section id="home" class="container text-center mt-9 fade-in">
    <br><br><br>
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.8); border: 2px solid rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                <h1 class="display-6 mb-4 font-weight-bold">Trenseter Pembelajaran Tryout Terbaik Untuk SNBT</h1>
                <p class="lead">Trenseter menyediakan platform persiapan pembelajaran dan try out yang unggul untuk memastikan kesuksesan Anda dalam SNBT. Temukan kunci keunggulan dengan solusi terbaik kami!</p>
                <a href="{{ route('login') }}" class="btn btn-dark hover-effect btn-lg">Read More →</a>
            </div>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="img/laptop.jpg" class="card-img-top" alt="Gambar Home">
        </div>
    </div>
</section>


<br><br><br><br>
{{-- Bagian Tentang Kami --}}
    <section id="about" class="container text-center py-5 fade-in">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.8); border: 2px solid rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                    <h2 class="display-4 mb-4">Tentang Kami</h2>
                    <p class="lead">Kami adalah platform pembelajaran online yang berkomitmen untuk menyediakan pembelajaran berkualitas tinggi dan tryout yang membantu siswa dalam persiapan ujian SNBT.</p>
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <img src="img/education.jpg" class="img-fluid rounded mt-4" alt="Gambar Tentang Kami">
            </div>
        </div>
    </section>
<br><br><br><br>
{{-- Bagian Layanan Kami --}}
    <section id="services" class="container text-center py-5 fade-in mb-4 "> <!-- Menambahkan kelas mb-4 untuk margin bawah -->
    <br><br><br><br><br><br><br>
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.8); border: 2px solid rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                <h2 class="display-4 mb-4">Layanan Kami</h2>
                <p class="lead">Kami menyediakan berbagai layanan termasuk kursus online, Latihan Soal, ujian simulasi, dan banyak lagi untuk membantu siswa mencapai hasil terbaik dalam ujian SNBT.</p>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <img src="img/cus.jpg" class="img-fluid mb-3" alt="Kursus Online">
                        <p>Kursus Online</p>
                    </div>
                    <div class="col-4">
                        <img src="img/belajar.jpg" class="img-fluid mb-3" alt="Bimbingan Belajar">
                        <p>Latihan Soal</p>
                    </div>
                    <div class="col-4">
                        <img src="img/belajar.jpg" class="img-fluid mb-3" alt="Ujian Simulasi">
                        <p>Ujian Simulasi</p>
                    </div>
            </div>
        </div>
    </div>
</section>


<br><br><br><br><br><br><br><br>
{{-- Bagian Kontak Kami --}}
    <section id="contact" class="container text-center py-5 fade-in">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.8); border: 2px solid rgba(0, 0, 0, 0.1);box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                    <h2 class="display-4 mb-4">Kontak Kami</h2>
                    <p class="lead">Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami melalui:</p>
                    <p class="lead">Email: info@snbt.com</p>
                    <p class="lead">Telepon: 123-456-7890</p>
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                    <img src="img/belajar.jpg" class="img-fluid rounded mt-4" alt="Gambar Kontak">
            </div>
        </div>
    </section>
</main>









@include('layouts.footer')



    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
// Menambahkan class "active" pada navbar saat tautan diklik
document.querySelectorAll('.navbar-nav a').forEach(anchor => {
    anchor.addEventListener('click', function () {
        document.querySelector('.navbar-nav').querySelectorAll('a').forEach(link => link.classList.remove('active'));
        this.classList.add('active');
    });
});

// Menambahkan class "active" pada navbar saat discroll
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar-nav');
    const sections = document.querySelectorAll('section');

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - sectionHeight / 3 && pageYOffset < sectionTop + sectionHeight - sectionHeight / 3) {
            const id = section.getAttribute('id');
            navbar.querySelectorAll('a').forEach(link => {
                if (link.getAttribute('href').slice(1) === id) {
                    navbar.querySelectorAll('a').forEach(link => link.classList.remove('active'));
                    link.classList.add('active');
                }
            });
        }
    });
});

</script>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>


</body>
</html>