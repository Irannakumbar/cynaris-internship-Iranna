<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm mx-auto" style="max-width: 800px;">

        <div class="card-body p-4">

            <h1 class="mb-3">{{ $post->title }}</h1>

            <p class="text-muted">
                Published on {{ $post->created_at->format('d M Y, h:i A') }}
            </p>

            <hr>

            <div class="fs-5" style="white-space: pre-line;">
                {{ $post->body }}
            </div>

            <hr>

            <div class="d-flex gap-2">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    Back
                </a>

                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">
                    Edit Post
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>