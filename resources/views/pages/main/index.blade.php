<x-app>

    @push('styles')
        <style>
            .hero-section {
                width: 100%;
                min-height: 80vh;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 80px 0;
                background-image: url('{{ asset('/assets/img/hero-bg.jpg') }}');
                background-size: cover;
                background-position: center;
            }

            /* Membuat lapisan gelap di atas gambar agar tulisan mudah dibaca */
            .hero-section::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                /* Ubah angka terakhir (0.5) untuk mengatur kegelapan */
            }

            /* Konten di dalam hero agar berada di atas lapisan gelap */
            .hero-section .container {
                position: relative;
                z-index: 2;
            }

            .hero-section h1 {
                font-size: 48px;
                font-weight: 700;
                margin-bottom: 20px;
                color: #fff;
            }

            .hero-section p {
                color: rgba(255, 255, 255, 0.8);
                margin-bottom: 30px;
                font-size: 20px;
            }

            .hero-section .cta-container {
                display: flex;
                flex-wrap: wrap;
                /* Agar tombol turun ke bawah di layar kecil */
                gap: 15px;
                /* Memberi jarak antar tombol */
                justify-content: center;
            }

            .hero-section .btn-hero-primary,
            .hero-section .btn-hero-secondary {
                font-weight: 500;
                font-size: 16px;
                letter-spacing: 1px;
                display: inline-block;
                padding: 12px 30px;
                border-radius: 5px;
                transition: 0.5s;
                text-decoration: none;
            }

            .hero-section .btn-hero-primary {
                background: var(--accent-color);
                /* Menggunakan warna aksen dari template Anda */
                color: #fff;
                border: 2px solid var(--accent-color);
            }

            .hero-section .btn-hero-primary:hover {
                background: transparent;
                border: 2px solid #fff;
                color: #fff;
            }

            .hero-section .btn-hero-secondary {
                background: transparent;
                color: #fff;
                border: 2px solid #fff;
            }

            .hero-section .btn-hero-secondary:hover {
                background: var(--accent-color);
                border: 2px solid var(--accent-color);
                color: #fff;
            }

            /* Penyesuaian untuk layar mobile (Responsif) */
            @media (max-width: 768px) {
                .hero-section {
                    min-height: 60vh;
                }

                .hero-section h1 {
                    font-size: 32px;
                }

                .hero-section p {
                    font-size: 18px;
                    margin-bottom: 20px;
                }
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section id="hero-section" class="hero-section section dark-background">

        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 data-aos="fade-up">SELAMAT DATANG DI POKDARWIS WEBSITE</h1>
                    <p data-aos="fade-up" data-aos-delay="100">Bersama Menjaga Pantai dan Kesehatan Komunitas</p>
                    <div class="cta-container" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('kegiatan.index') }}" class="btn-hero-primary">Lihat Kegiatan Kami</a>
                        <a href="{{ route('malaria.index') }}" class="btn-hero-secondary">Pelajari Tentang Malaria</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <section id="trending-category" class="trending-category section">
        {{-- ... kode Anda selanjutnya ... --}}
    </section>

    <!-- Slider Section -->
    <section id="slider" class="slider section dark-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">

                <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                        },
                        "navigation": {
                          "nextEl": ".swiper-button-next",
                          "prevEl": ".swiper-button-prev"
                        }
                      }
                  </script>

                <div class="swiper-wrapper">

                    @foreach ($posts as $post)
                        <div class="swiper-slide" style="background-image: url('{{ asset('storage/' . $post->image) }}');">
                            <div class="content">
                                <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{{ Str::limit($post->content, 150, '...') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Slider Section -->

    <!-- Trending Category Section -->
    <section id="trending-category" class="trending-category section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    @foreach ($onePopularPosts as $post)
                        <div class="col-lg-4">
                            <div class="post-entry lg">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                </a>
                                <div class="post-meta">
                                    <span class="date">{{ optional($post->category)->name }}</span>
                                    <span class="mx-1">•</span>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                    <span class="mx-1">•</span>
                                    <span>{{ number_format($post->views) }} views</span>
                                </div>
                                <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p class="mb-4 d-block">{{ Str::limit($post->content, 150, '...') }}</p>

                                <div class="d-flex align-items-center author">
                                    <div class="photo">
                                        <img src="{{ $post->user->getUserAvatar() }}" alt="{{ $post->user->name }}" class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $post->user->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($popularPosts->slice(0, 3) as $post)
                                    <div class="post-entry">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                        </a>
                                        <div class="post-meta">
                                            <span class="date">{{ optional($post->category)->name }}</span>
                                            <span class="mx-1">•</span>
                                            <span>{{ $post->created_at->format('M jS Y') }}</span>
                                        </div>
                                        <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($popularPosts->slice(3, 3) as $post)
                                    <div class="post-entry">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                        </a>
                                        <div class="post-meta">
                                            <span class="date">{{ optional($post->category)->name }}</span>
                                            <span class="mx-1">•</span>
                                            <span>{{ $post->created_at->format('M jS Y') }}</span>
                                        </div>
                                        <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Trending Section -->
                            <div class="col-lg-4">

                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        @foreach ($popularPosts->slice(0, 4) as $key => $post)
                                            <li>
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    <span class="number">{{ $key + 1 }}</span>
                                                    <h3>{{ $post->title }}</h3>
                                                    <span class="author">{{ $post->user->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div> <!-- End Trending Section -->
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>

        </div>

    </section><!-- /Trending Category Section -->

    @foreach ($categoriesWithPosts as $category)
        @if ($category->posts->isNotEmpty())
            {{-- 
                PEMBAGIAN POST UNTUK LAYOUT:
                - Kolom Kiri (col-lg-4):
                    - 1 Post Utama: $leftMainPost (indeks 0)
                    - 2 Post di bawahnya: $leftSubPosts (indeks 1-2)
                - Kolom Kanan (col-lg-8), dibagi 3 kolom lagi:
                    - Kolom Kanan 1: $rightCol1Posts (indeks 3-5)
                    - Kolom Kanan 2: $rightCol2Posts (indeks 6-8)
                    - Kolom Kanan 3: $rightCol3Posts (indeks 9 dan seterusnya)
            --}}
            @php
                $posts = $category->posts;
                $leftMainPost = $posts->get(0);
                $leftSubPosts = $posts->slice(1, 2);
                $rightCol1Posts = $posts->slice(3, 3);
                $rightCol2Posts = $posts->slice(6, 3);
                $rightCol3Posts = $posts->slice(9);
            @endphp

            <section id="{{ $category->slug }}-category" class="lifestyle-category section">

                <div class="container section-title" data-aos="fade-up">
                    <div class="section-title-container d-flex align-items-center justify-content-between">
                        <h2>{{ $category->name }}</h2>
                        {{-- Menggunakan route yang sudah Anda buat --}}
                        <p><a href="{{ route('category.show', $category->slug) }}">See All {{ $category->name }}</a></p>
                    </div>
                </div>
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row g-5">
                        {{-- KOLOM KIRI (LEBAR 4) --}}
                        <div class="col-lg-4">
                            @if ($leftMainPost)
                                <div class="post-list lg">
                                    <a href="{{ route('posts.show', $leftMainPost->slug) }}">
                                        <img src="{{ asset('storage/' . $leftMainPost->image) }}" alt="{{ $leftMainPost->title }}"
                                            class="img-fluid">
                                    </a>
                                    <div class="post-meta">
                                        <span class="date">{{ $category->name }}</span> <span class="mx-1">•</span>
                                        <span>{{ $leftMainPost->created_at->format('M jS \'y') }}</span>
                                    </div>
                                    <h2><a href="{{ route('posts.show', $leftMainPost->slug) }}">{{ $leftMainPost->title }}</a></h2>
                                    <p class="mb-4 d-block">{{ Str::limit(strip_tags($leftMainPost->content), 200) }}</p>

                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img src="{{ $leftMainPost->user->getUserAvatar() }}"
                                                alt="{{ $leftMainPost->user->name }}" class="img-fluid"></div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">{{ $leftMainPost->user->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach ($leftSubPosts as $post)
                                <div class="post-list {{ $loop->first ? 'border-bottom' : '' }}">
                                    <div class="post-meta">
                                        <span class="date">{{ $category->name }}</span> <span class="mx-1">•</span>
                                        <span>{{ $post->created_at->format('M jS \'y') }}</span>
                                    </div>
                                    <h2 class="mb-2"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                    <span class="author mb-3 d-block">{{ $post->user->name }}</span>
                                </div>
                            @endforeach
                        </div>

                        {{-- KOLOM KANAN (LEBAR 8) --}}
                        <div class="col-lg-8">
                            <div class="row g-5">
                                {{-- Kolom Kanan 1 --}}
                                <div class="col-lg-4 border-start custom-border">
                                    @foreach ($rightCol1Posts as $post)
                                        <div class="post-list">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                            </a>
                                            <div class="post-meta">
                                                <span class="date">{{ $category->name }}</span> <span class="mx-1">•</span>
                                                <span>{{ $post->created_at->format('M jS \'y') }}</span>
                                            </div>
                                            <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Kolom Kanan 2 --}}
                                <div class="col-lg-4 border-start custom-border">
                                    @foreach ($rightCol2Posts as $post)
                                        <div class="post-list">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                            </a>
                                            <div class="post-meta">
                                                <span class="date">{{ $category->name }}</span> <span class="mx-1">•</span>
                                                <span>{{ $post->created_at->format('M jS \'y') }}</span>
                                            </div>
                                            <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Kolom Kanan 3 --}}
                                <div class="col-lg-4">
                                    @foreach ($rightCol3Posts as $post)
                                        <div class="post-list border-bottom">
                                            <div class="post-meta">
                                                <span class="date">{{ $category->name }}</span> <span class="mx-1">•</span>
                                                <span>{{ $post->created_at->format('M jS \'y') }}</span>
                                            </div>
                                            <h2 class="mb-2"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                            <span class="author mb-3 d-block">{{ $post->user->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    {{-- <!-- Business Category Section -->
    <section id="business-category" class="business-category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-title-container d-flex align-items-center justify-content-between">
                <h2>Business</h2>
                <p><a href="categories.html">See All Business</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-md-9 order-md-2">

                    <div class="d-lg-flex post-entry">
                        <a href="blog-details.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                            <img src="{{ asset('assets/img/post-landscape-3.jpg') }}" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                            </div>
                            <h3><a href="blog-details.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore.
                                Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos
                                deleniti?</p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="{{ asset('assets/img/person-4.jpg') }}" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-list border-bottom">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-5.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae,
                                    inventore pariatur numquam cumque possimus</p>
                            </div>

                            <div class="post-list">
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">5 Great Startup Tips for Female Founders</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-7.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a>
                                </h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae,
                                    inventore pariatur numquam cumque possimus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New
                                Haircut</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Business Category Section -->

    <!-- Lifestyle Category Section -->
    <section id="lifestyle-category" class="lifestyle-category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-title-container d-flex align-items-center justify-content-between">
                <h2>Lifestyle</h2>
                <p><a href="categories.html">See All Lifestyle</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="post-list lg">
                        <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-8.jpg') }}" alt=""
                                class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2><a href="blog-details.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                        <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore
                            pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis
                            molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo,
                            praesentium dignissimos</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{ asset('assets/img/person-7.jpg') }}" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">Esther Howard</h3>
                            </div>
                        </div>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list">
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-lg-4 border-start custom-border">
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-6.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2><a href="blog-details.html">Let’s Get Back to Work, New York</a></h2>
                            </div>
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-5.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 17th
                                        '22</span></div>
                                <h2><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                            </div>
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-4.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Mar 15th
                                        '22</span></div>
                                <h2><a href="blog-details.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4 border-start custom-border">
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-3.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2><a href="blog-details.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                            </div>
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-2.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Mar 1st '22</span>
                                </div>
                                <h2><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                            </div>
                            <div class="post-list">
                                <a href="blog-details.html"><img src="{{ asset('assets/img/post-landscape-1.jpg') }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2><a href="blog-details.html">5 Great Startup Tips for Female Founders</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a>
                                </h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your
                                        New Haircut</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">•</span> <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Lifestyle Category Section --> --}}
</x-app>
