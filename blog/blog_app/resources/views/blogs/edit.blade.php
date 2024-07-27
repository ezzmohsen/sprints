<!DOCTYPE html>
<html>

<head>
    <title>Edit Blog</title>
</head>

<body>
    <h1>Edit Blog</h1>
    <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $blog->title }}" required>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required>{{ $blog->content }}</textarea>
        <button type="submit">Update</button>
    </form>
</body>

</html>