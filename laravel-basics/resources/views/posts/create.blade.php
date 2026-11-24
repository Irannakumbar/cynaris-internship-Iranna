<!DOCTYPE html>
<html>
<head>
    <title>Create Blog Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm mx-auto" style="max-width: 700px;">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Create New Post</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('posts.store') }}" method="POST">

                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Post Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           placeholder="Enter post title">

                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="mb-3">
                    <label class="form-label">Post Content</label>

                    <textarea name="body"
                              rows="6"
                              class="form-control"
                              placeholder="Write your blog content...">{{ old('body') }}</textarea>

                    @error('body')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Publish Post
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