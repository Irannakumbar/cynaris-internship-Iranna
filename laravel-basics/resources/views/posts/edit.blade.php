<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm mx-auto" style="max-width: 700px;">

        <div class="card-header bg-warning">
            <h3 class="mb-0">Edit Blog Post</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('posts.update', $post) }}" method="POST">

                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Post Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title', $post->title) }}">

                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="mb-3">
                    <label class="form-label">Post Content</label>

                    <textarea name="body"
                              rows="6"
                              class="form-control">{{ old('body', $post->body) }}</textarea>

                    @error('body')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update Post
                    </button>

                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>