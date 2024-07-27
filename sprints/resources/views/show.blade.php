@if ($editing ?? false)
    <form method="post">
        @method('put')
        <li>{{$post}}</li>
        <input type="text" name="content">
        <button type="submit">submit</button>
    </form>
@endif