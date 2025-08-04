<x-app>

    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Kategori {{ $category->name }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="">Kategori</a></li>
                    <li class="current">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="mb-4">
                    <p class="text-muted">{{ $category->description }}</p>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-primary">{{ $category->posts_count }} Posts</span>
                    </div>
                </div>

                @if ($category->posts->count() > 0)
                    <div class="row g-4">
                        @foreach ($category->posts as $post)
                            <div class="col-md-6">
                                <div class="card h-100">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                                    @endif
                                    <div class="card-body">
                                        <div class="d-flex gap-2 mb-2">
                                            @foreach ($post->categories as $cat)
                                                <a href="{{ route('category.show', $cat->slug) }}"
                                                    class="badge bg-primary text-decoration-none">{{ $cat->name }}</a>
                                            @endforeach
                                        </div>
                                        <h5 class="card-title">
                                            <a href="{{ route('posts.show', $post->slug) }}"
                                                class="text-decoration-none text-dark">{{ $post->title }}</a>
                                        </h5>
                                        <p class="card-text text-muted">{{ Str::limit($post->excerpt, 100) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ $post->user->getUserAvatar() }}" alt="{{ $post->user->name }}" class="rounded-circle"
                                                    width="32" height="32">
                                                <span class="text-muted small">{{ $post->user->name }}</span>
                                            </div>
                                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        No posts found in this category.
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <!-- Popular Posts Widget -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Popular Posts</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($popularPosts as $post)
                            <a href="{{ route('posts.show', $post->slug) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ Str::limit($post->title, 50) }}</h6>
                                    <small class="text-muted">{{ $post->views }} views</small>
                                </div>
                                <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Categories</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($categories as $cat)
                            <a href="{{ route('category.show', $cat->slug) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $cat->name }}
                                <span class="badge bg-primary rounded-pill">{{ $cat->posts_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags Widget -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Popular Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                                <a href="{{ route('tags.show', $tag->slug) }}" class="badge bg-secondary text-decoration-none">
                                    {{ $tag->name }} ({{ $tag->posts_count }})
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
