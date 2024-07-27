<!DOCTYPE html>
<html>

<head>
    <title>All Blogs</title>
</head>

<body>
    <h1>All Blogs</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    @auth
        <a href="{{ route('blogs.create') }}">Create New Blog</a>
    @endauth
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->content }}</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                        @if(Auth::check() && Auth::id() === $blog->user_id)
                            <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>