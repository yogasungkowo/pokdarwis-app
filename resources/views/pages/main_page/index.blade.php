@push('styles')
<style>
    /* Article Cards */
    .article-card {
        transition: all 0.3s ease;
        background: white;
    }

    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12) !important;
    }

    .article-card img {
        height: 200px;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .article-card:hover img {
        transform: scale(1.05);
    }

    .article-card .card-title {
        color: #2c3e50;
        font-size: 1.25rem;
        line-height: 1.4;
        margin-top: 0.5rem;
    }

    .article-card .badge {
        font-weight: 500;
        padding: 0.5em 1em;
    }

    .article-card .card-text {
        color: #576574;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .article-card .btn-outline-success {
        border-width: 2px;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .article-card .btn-outline-success:hover {
        background: linear-gradient(45deg, #28a745, #20c997);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
    }

    .fade-in-bg {
        opacity: 0;
        animation: fadeInBg 1.2s ease-in-out forwards;
    }
    @keyframes fadeInBg {
        to { opacity: 1; }
    }
    .fade-in {
        opacity: 0;
        animation: fadeIn 1.2s 0.5s ease-in-out forwards;
    }
    @keyframes fadeIn {
        to { opacity: 1; }
    }
    .judul {
        text-shadow: 0 4px 16px rgba(0,0,0,0.7), 0 1px 0 #222;
        letter-spacing: 2px;
    }
    .jumbotron {
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
        position: relative;
        overflow: hidden;
        padding: 3rem 1.5rem;
    }
    .jumbotron::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(120deg, rgba(0,0,0,0.55) 60%, rgba(0,123,255,0.25) 100%);
        z-index: 1;
    }
    .jumbotron > .container {
        position: relative;
        z-index: 2;
    }
    .subjudul {
        text-shadow: 0 2px 8px rgba(0,0,0,0.4);
        font-size: 1.5rem;
        font-weight: 400;
    }
    .btn-custom {
        border-width: 2px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        transition: all 0.2s;
    }
    .btn-custom:hover {
        background: #fff !important;
        color: #0d6efd !important;
        border-color: #0d6efd !important;
        box-shadow: 0 4px 16px rgba(0,0,0,0.18);
    }
    .section-title {
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .about-img {
        border-radius: 1rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.10);
        width: 100%;
        object-fit: cover;
        max-height: 320px;
    }
    .activity-card {
        border-radius: 1rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        transition: transform 0.2s;
        background: #fff;
    }
    .activity-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.13);
    }
    /* Carousel Styling */
    .carousel-card {
        border-radius: 1rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
        overflow: hidden;
        margin: 0 10px;
        height: 100%;
    }
    .carousel-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0,0,0,0.2);
    }
    .carousel-card img {
        object-fit: cover;
        height: 200px;
        transition: transform 0.3s ease;
    }
    .carousel-card:hover img {
        transform: scale(1.05);
    }
    .carousel-card .card-body {
        padding: 1.5rem;
    }
    .carousel-card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a3c34;
    }
    .carousel-card .card-text {
        font-size: 0.95rem;
        color: #555;
    }
    .carousel-card .btn {
        background: linear-gradient(90deg, #28a745, #20c997);
        border: none;
        transition: background 0.3s ease;
    }
    .carousel-card .btn:hover {
        background: linear-gradient(90deg, #218838, #1ca085);
    }
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        background: rgba(0,0,0,0.3);
        border-radius: 1rem;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 50%;
    }
    .carousel-indicators {
        bottom: -50px;
    }
    .carousel-indicators button {
        background-color: #28a745 !important;
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
        .carousel-inner .carousel-item > div {
            display: none;
        }
        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }
    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
        display: flex;
    }
    @media (min-width: 768px) {
        .carousel-inner .carousel-item-end.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(33.33%);
        }
        .carousel-inner .carousel-item-start.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-33.33%);
        }
        .carousel-inner .carousel-item > div {
            flex: 0 0 33.33%;
        }
    }
    .carousel-inner .carousel-item-end,
    .carousel-inner .carousel-item-start {
        transform: translateX(0);
    }
</style>
@endpush

<x-app>
    <div class="p-5 mb-4 bg-light jumbotron fade-in-bg"
         style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.2)), url('{{ asset('img/foto_pantai_merdeka.png') }}'); background-size: cover; background-position: center;">
        <div class="container py-5 text-center text-md-start">
            <h1 class="display-5 fw-bold fade-in text-white judul"><span class="text-warning">SELAMAT DATANG DI</span> POKDARWIS</h1>
            <p class="mx-auto fs-1 fade-in text-white fst-italic w-100 w-md-75">Bersama Menjaga Pantai Dan Kesehatan Komunitas</p>
            <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-75 justify-content-center justify-content-md-start">
                <a href="#" class="btn btn-outline-primary btn-lg fade-in text-light fw-bold">Lihat Kegiatan Kami</a>
                <a href="#" class="btn btn-outline-danger btn-lg fade-in text-light fw-bold">Pelajari Tentang Malaria</a>
            </div>
        </div>
    </div>

    <!-- Section: Tentang Pokdarwis -->
    <section class="container my-5 py-4">
        <div class="row align-items-center g-4">
            <div class="col-md-6 order-2 order-md-1">
                <h2 class="section-title text-primary">Tentang POKDARWIS</h2>
                <p class="fs-5 mb-3">POKDARWIS (Kelompok Sadar Wisata) adalah komunitas yang berperan aktif dalam menjaga kelestarian lingkungan, mengembangkan potensi wisata lokal, dan meningkatkan kesejahteraan masyarakat sekitar. Kami percaya bahwa pariwisata berkelanjutan adalah kunci untuk masa depan yang lebih baik.</p>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Edukasi lingkungan & kesehatan</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pemberdayaan ekonomi lokal</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pelestarian budaya & alam</li>
                </ul>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center">
                <img src="{{ asset('img/foto_pantai_merdeka.png') }}" alt="Tentang Pokdarwis" class="about-img mb-3 mb-md-0">
            </div>
        </div>
    </section>

    <!-- Section: Kegiatan Ekowisata -->
    <section class="container my-5 py-4">
        <h2 class="section-title text-danger text-center mb-4">Kegiatan Ekowisata</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-4">
                <div class="activity-card p-4 h-100 text-center">
                    <img src="https://img.icons8.com/color/36760/alps" alt="Edukasi Lingkungan" width="64" class="mb-3">
                    <h5 class="fw-bold mb-2">Edukasi Lingkungan</h5>
                    <p class="mb-0">Workshop, pelatihan, dan aksi nyata menjaga kebersihan pantai serta ekosistem sekitar.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="activity-card p-4 h-100 text-center">
                    <img src="https://img.icons8.com/color/96/000000/people-working-together.png" alt="Pemberdayaan Komunitas" width="64" class="mb-3">
                    <h5 class="fw-bold mb-2">Pemberdayaan Komunitas</h5>
                    <p class="mb-0">Mendukung UMKM, pelatihan pemandu wisata, dan pengembangan produk lokal.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="activity-card p-4 h-100 text-center">
                    <img src="https://img.icons8.com/color/96/000000/beach.png" alt="Wisata Alam" width="64" class="mb-3">
                    <h5 class="fw-bold mb-2">Wisata Alam & Budaya</h5>
                    <p class="mb-0">Eksplorasi pantai, wisata budaya, dan promosi kearifan lokal untuk wisatawan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Artikel & Blog -->
    <section class="container my-5 py-4">
        <h2 class="section-title text-success text-center mb-5">Artikel & Blog</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm rounded-3 border-0 article-card overflow-hidden">
                    <img src="https://via.placeholder.com/400x200?text=Kebersihan+Pantai" class="card-img-top" alt="Kebersihan Pantai">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <span class="badge bg-success mb-2">Lingkungan</span>
                            <h5 class="card-title fw-bold">Menjaga Kebersihan Pantai</h5>
                            <p class="text-muted small mb-2">1 Agustus 2025 • 5 menit baca</p>
                        </div>
                        <p class="card-text flex-grow-1">Pelajari cara kami menjaga kebersihan pantai melalui aksi nyata dan edukasi lingkungan bersama komunitas lokal.</p>
                        <a href="#" class="btn btn-outline-success mt-2 align-self-start">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm rounded-3 border-0 article-card overflow-hidden">
                    <img src="https://via.placeholder.com/400x200?text=UMKM+Lokal" class="card-img-top" alt="UMKM Lokal">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <span class="badge bg-success mb-2">Komunitas</span>
                            <h5 class="card-title fw-bold">Pemberdayaan UMKM Lokal</h5>
                            <p class="text-muted small mb-2">31 Juli 2025 • 3 menit baca</p>
                        </div>
                        <p class="card-text flex-grow-1">Dukungan kami terhadap UMKM lokal melalui pelatihan dan promosi produk unggulan untuk kesejahteraan bersama.</p>
                        <a href="#" class="btn btn-outline-success mt-2 align-self-start">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm rounded-3 border-0 article-card overflow-hidden">
                    <img src="https://via.placeholder.com/400x200?text=Wisata+Budaya" class="card-img-top" alt="Wisata Budaya">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <span class="badge bg-success mb-2">Wisata</span>
                            <h5 class="card-title fw-bold">Wisata Budaya Pantai</h5>
                            <p class="text-muted small mb-2">30 Juli 2025 • 4 menit baca</p>
                        </div>
                        <p class="card-text flex-grow-1">Jelajahi keindahan budaya lokal dan pantai melalui tur wisata yang kami selenggarakan untuk pengalaman tak terlupakan.</p>
                        <a href="#" class="btn btn-outline-success mt-2 align-self-start">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>

@push('scripts')
<script>
    // Ensure smooth carousel transition for multi-item
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('#artikelCarousel');
        if (carousel) {
            carousel.addEventListener('slide.bs.carousel', function (e) {
                const $e = e.relatedTarget;
                const idx = Array.from($e.parentElement.children).indexOf($e);
                const itemsPerSlide = window.innerWidth >= 768 ? 3 : 1;
                const totalItems = document.querySelectorAll('.carousel-item').length;

                if (e.direction === 'left') {
                    const nextIdx = idx + itemsPerSlide;
                    if (nextIdx >= totalItems) {
                        const appendItems = document.querySelectorAll('.carousel-item').slice(0, itemsPerSlide);
                        appendItems.forEach(item => {
                            carousel.querySelector('.carousel-inner').appendChild(item.cloneNode(true));
                        });
                    }
                } else {
                    const prevIdx = idx - itemsPerSlide;
                    if (prevIdx <= 0) {
                        const appendItems = document.querySelectorAll('.carousel-item').slice(-itemsPerSlide);
                        appendItems.forEach(item => {
                            carousel.querySelector('.carousel-inner').prepend(item.cloneNode(true));
                        });
                    }
                }
            });
        }
    });
</script>
@endpush