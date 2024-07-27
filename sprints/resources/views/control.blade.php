<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>


        @foreach ($posts as $post)


            <form method=" post" action="{{route('update', $post->id)}}">
                @method('put')
                @csrf
                <li>{{$post->content}}</li>
                <input type="text" name="content">
                <button type="submit">submit</button>
            </form>


        @endforeach

    </ul>

</body>

</html>