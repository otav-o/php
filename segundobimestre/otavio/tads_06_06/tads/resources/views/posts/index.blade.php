<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    <form action="{{route('posts.show',['post' => $post->id])}}" method="get">
                        <input type="submit" value="Show">
                    </form>
                </td>
                <td>
                    <form action="{{route('posts.edit',['post' => $post->id])}}" method="get">
                        <input type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="{{route('posts.destroy',['post' => $post->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>    
</body>
</html>