<!DOCTYPE html>
<html>

<head>
    <title>Create Blog</title>
</head>

<body>
    <h1>Create Blog</h1>
    <form method="POST" action="{{ route('blogs.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea>
        <button type="submit">Create</button>
    </form>
</body>

</html>