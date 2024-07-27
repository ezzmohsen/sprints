<!DOCTYPE html>
<html>

<head>
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <label for="content">Content:</label>
        <textarea name="content" id="content" required>{{ $post->content }}</textarea>
        <button type="submit">Update</button>
    </form>
</body>

</html>