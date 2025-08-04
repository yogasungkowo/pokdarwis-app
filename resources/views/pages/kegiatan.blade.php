<x-app>
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Kegiatan Kami</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Kegiatan</li>
                </ol>
            </nav>
        </div>
    </div><section id="kegiatan-list" class="kegiatan-list section">
        <div class="container">
            <div class="section-title-container text-center" data-aos="fade-up">
              <h2>Dokumentasi Kegiatan Pokdarwis</h2>
              <p>Inilah sebagian dari aksi dan inisiatif yang telah kami laksanakan bersama komunitas untuk lingkungan dan pariwisata yang lebih baik.</p>
            </div>

            {{-- Nanti, bagian ini bisa di-loop dengan @foreach dari database --}}

            <div class="kegiatan-item row gy-4 align-items-center" data-aos="fade-up">
                <div class="col-lg-4">
                    <img src="https://picsum.photos/seed/kegiatan1/800/600" class="img-fluid" alt="Aksi Bersih Pantai">
                </div>
                <div class="col-lg-8">
                    <div class="kegiatan-content">
                        <div class="post-meta mb-2">
                            <span class="date">Aksi Lingkungan</span>
                            <span class="mx-1">•</span>
                            <span>Sen, 04 Agu 2025</span>
                        </div>
                        <h3>Aksi Bersih Pantai Bulanan Edisi Agustus</h3>
                        <p>Sebagai komitmen rutin, kami kembali mengadakan aksi bersih pantai yang melibatkan puluhan relawan dari masyarakat lokal, pelajar, dan wisatawan. Bulan ini, kami berhasil mengumpulkan lebih dari 200 kg sampah non-organik dari garis pantai utama.</p>
                        <a href="#" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><hr class="my-5">

            <div class="kegiatan-item row gy-4 align-items-center" data-aos="fade-up">
                <div class="col-lg-4">
                    <img src="https://picsum.photos/seed/kegiatan2/800/600" class="img-fluid" alt="Pelatihan UMKM">
                </div>
                <div class="col-lg-8">
                    <div class="kegiatan-content">
                        <div class="post-meta mb-2">
                            <span class="date">Pemberdayaan Ekonomi</span>
                            <span class="mx-1">•</span>
                            <span>Sab, 19 Jul 2025</span>
                        </div>
                        <h3>Pelatihan Pembuatan Cinderamata dari Bahan Daur Ulang</h3>
                        <p>Kami bekerja sama dengan pengrajin lokal untuk memberikan pelatihan kepada ibu-ibu PKK dalam mengolah sampah plastik menjadi produk cinderamata yang memiliki nilai jual. Inisiatif ini bertujuan untuk mengurangi sampah sekaligus meningkatkan pendapatan keluarga.</p>
                        <a href="#" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><hr class="my-5">

            <div class="kegiatan-item row gy-4 align-items-center" data-aos="fade-up">
                <div class="col-lg-4">
                    <img src="https://picsum.photos/seed/kegiatan3/800/600" class="img-fluid" alt="Penyuluhan Kesehatan">
                </div>
                <div class="col-lg-8">
                    <div class="kegiatan-content">
                        <div class="post-meta mb-2">
                            <span class="date">Kesehatan Komunitas</span>
                            <span class="mx-1">•</span>
                            <span>Min, 29 Jun 2025</span>
                        </div>
                        <h3>Penyuluhan dan Fogging Pencegahan Malaria</h3>
                        <p>Menjelang musim penghujan, Pokdarwis bersama Puskesmas setempat mengadakan penyuluhan tentang bahaya malaria dan cara pencegahannya melalui gerakan 3M Plus. Acara dilanjutkan dengan pengasapan (fogging) di area-area yang berisiko menjadi sarang nyamuk.</p>
                        <a href="#" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><div class="pagination d-flex justify-content-center mt-5">
              <ul>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div></div>
    </section></x-app>