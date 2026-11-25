<!DOCTYPE html>
<html>
<head>
    <title>Blog Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Blog Management</h2>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            + Create Post
        </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Posts list --}}
    <div class="card shadow-sm">
        <div class="card-body">

            @forelse($posts as $post)

                <div class="border-bottom py-4">

                    <h4>{{ $post->title }}</h4>

                    <p class="text-muted">
                        {{ Str::limit($post->body, 150) }}
                    </p>

                    <small class="text-secondary">
                        Created: {{ $post->created_at->format('d M Y') }}
                    </small>

                    <div class="mt-3 d-flex gap-2">

                        <a href="{{ route('posts.show', $post) }}"
                           class="btn btn-sm btn-info">
                            View
                        </a>

                        <a href="{{ route('posts.edit', $post) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">
                    <h5>No blog posts available</h5>
                    <p class="text-muted">Create your first blog post to get started.</p>

                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        Create First Post
                    </a>
                </div>

            @endforelse

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>

</div>

</body>
</html>