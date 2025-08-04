<x-app>
    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Kategori</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Kategori</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <!-- Blog Posts Section -->
                <section id="blog-posts" class="blog-posts">
                    @foreach ($categories as $category)
                        <div class="category-section mb-5">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h2 class="category-title mb-0">{{ $category->name }}</h2>
                                <a href="{{ route('category.show', $category->slug) }}" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>

                            <div class="row g-4">
                                @forelse ($category->paginatedPosts as $post)
                                    <div class="col-md-6">
                                        <article class="post-card position-relative h-100 shadow-sm rounded overflow-hidden">
                                            <div class="post-img position-relative overflow-hidden">
                                                @if ($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid w-100"
                                                        alt="{{ $post->title }}" style="height: 250px; object-fit: cover;">
                                                @endif
                                                <span class="post-date">{{ $post->created_at->format('F d, Y') }}</span>
                                            </div>

                                            <div class="post-content d-flex flex-column p-4">
                                                <h3 class="post-title mb-3">
                                                    <a href="{{ route('posts.show', $post->slug) }}" class="text-dark text-decoration-none">
                                                        {{ $post->title }}
                                                    </a>
                                                </h3>

                                                <div class="meta d-flex align-items-center mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-person"></i>
                                                        <span class="ps-2">{{ $post->user->name }}</span>
                                                    </div>
                                                    <span class="px-3 text-black-50">/</span>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-eye"></i>
                                                        <span class="ps-2">{{ number_format($post->views) }} views</span>
                                                    </div>
                                                </div>

                                                <p class="flex-grow-1">
                                                    {{ Str::limit($post->content, 150, '...') }}
                                                </p>

                                                <div class="post-footer mt-3 pt-3 border-top">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="tags">
                                                            @foreach ($post->tags as $tag)
                                                                <span class="badge bg-light text-dark me-1">{{ $tag->name }}</span>
                                                            @endforeach
                                                        </div>
                                                        <a href="{{ route('posts.show', $post->slug) }}" class="readmore">
                                                            <span>Read More</span>
                                                            <i class="bi bi-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            No posts found in this category.
                                        </div>
                                    </div>
                                @endforelse
                            </div>

                            <!-- Category Pagination -->
                            @if ($category->paginatedPosts->hasPages())
                                <div class="blog-pagination mt-4">
                                    {{ $category->paginatedPosts->links() }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{-- 
                <div class="col-lg-6">
                  <article class="position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                      <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt="">
                      <span class="post-date">March 19</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                      <h3 class="post-title">Nisi magni odit consequatur autem nulla dolorem</h3>

                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                        </div>
                      </div>

                      <p>
                        Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.
                      </p>

                      <hr>

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article class="position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                      <img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt="">
                      <span class="post-date">June 24</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                      <h3 class="post-title">Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.</h3>

                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                        </div>
                      </div>

                      <p>
                        Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis.
                      </p>

                      <hr>

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article class="position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                      <img src="assets/img/blog/blog-4.jpg" class="img-fluid" alt="">
                      <span class="post-date">August 05</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                      <h3 class="post-title">Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.</h3>

                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                        </div>
                      </div>

                      <p>
                        Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.
                      </p>

                      <hr>

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article class="position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                      <img src="assets/img/blog/blog-5.jpg" class="img-fluid" alt="">
                      <span class="post-date">September 17</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                      <h3 class="post-title">Accusamus quaerat aliquam qui debitis facilis consequatur</h3>

                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2">John Parker</span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                        </div>
                      </div>

                      <p>
                        In itaque assumenda aliquam voluptatem qui temporibus iusto nisi quia. Autem vitae quas aperiam nesciunt mollitia tempora odio omnis. Ipsa odit sit ut amet necessitatibus. Quo ullam ut corrupti autem consequuntur totam dolorem.
                      </p>

                      <hr>

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>
                </div><!-- End post list item -->

                <div class="col-lg-6">
                  <article class="position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                      <img src="assets/img/blog/blog-6.jpg" class="img-fluid" alt="">
                      <span class="post-date">December 07</span>
                    </div>

                    <div class="post-content d-flex flex-column">

                      <h3 class="post-title">Distinctio provident quibusdam numquam aperiam aut</h3>

                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2">Julia White</span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                        </div>
                      </div>

                      <p>
                        Expedita et temporibus eligendi enim molestiae est architecto praesentium dolores. Illo laboriosam officiis quis. Labore officia quia sit voluptatem nisi est dignissimos totam. Et voluptate et consectetur voluptatem id dolor magni impedit. Omnis dolores sit.
                      </p>

                      <hr>

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>
                </div><!-- End post list item --> --}}

            </div>
            <div class="col-lg-4">
                <div class="widgets-container">

                    <!-- Blog Author Widget 2 -->
                    <div class="blog-author-widget-2 widget-item">

                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ $user->getUserAvatar() }}" class="rounded-circle flex-shrink-0" alt="">
                            <h4>{{ $user->name }}</h4>
                            <div class="social-links">
                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                            </div>

                            <p>
                                {{ $user->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}
                            </p>

                        </div>
                    </div><!--/Blog Author Widget 2 -->
                    <!-- Search Widget -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Search Posts</h3>
                        <form action="{{ route('posts.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search posts...">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="list-unstyled">
                            @foreach ($categories as $cat)
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="{{ route('category.show', $cat->slug) }}" class="text-dark">
                                        {{ $cat->name }}
                                    </a>
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $cat->posts_count ?? $cat->posts->count() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div><!--/Categories Widget -->

                    <!-- Popular Posts Widget -->
                    @if (isset($popularPosts) && $popularPosts->count() > 0)
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Popular Posts</h3>
                            @foreach ($popularPosts as $post)
                                <div class="post-item border-bottom pb-3 mb-3">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="flex-shrink-0">
                                    @endif
                                    <div>
                                        <h4>
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                {{ Str::limit($post->title, 50) }}
                                            </a>
                                        </h4>
                                        <div class="meta">
                                            <time datetime="{{ $post->created_at }}">
                                                {{ $post->created_at->format('M d, Y') }}
                                            </time>
                                            <span class="mx-2">•</span>
                                            <span>{{ number_format($post->views) }} views</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <!--/Popular Posts Widget -->

                    <!-- Tags Widget -->
                    @if (isset($tags) && $tags->count() > 0)
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Popular Tags</h3>
                            <ul class="list-unstyled d-flex flex-wrap gap-2">
                                @foreach ($tags as $tag)
                                    <li>
                                        <a href="{{ route('tags.show', $tag->slug) }}" class="badge bg-light text-dark text-decoration-none">
                                            {{ $tag->name }}
                                            <span class="ms-1 text-muted">({{ $tag->posts_count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--/Tags Widget -->

                </div>

            </div>
        </div>
        {{-- <!-- Blog Pagination Section -->
            <section id="blog-pagination" class="blog-pagination section">
                
            <div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#" class="active">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">10</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>

          </section><!-- /Blog Pagination Section --> --}}



    </div>


</x-app>
