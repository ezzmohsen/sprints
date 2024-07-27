<!DOCTYPE html>
<html>

<head>
    <title>Posts</title>
</head>

<body>
    <h1>Posts</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td><a href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>