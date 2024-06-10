<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@auth
    <p>Logged in!</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    <div>
        <h2>Add new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input name="title" type="text" placeholder="post title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Save post</button>
        </form>
    </div>
    <div>
        @foreach($posts as $post)
            <div style="background-color: lightcyan; padding:10px; margin:10px; border-radius: 10px;">
                <h3>{{$post['title']}}</h3>
                <p>{{$post['body']}}</p>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <div>
    <h1>Register</h1>
    <form action="/register" method="POST"> <!--az az url amin keresztül regisztrálunk új felhasználót-->
        @csrf <!--enélkül nem működik az oldal ahova menni akarunk 409-es vagy 404-es hibát ad-->
        <input name="name" type="text" placeholder="name">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <button>Register</button>
    </form>
    </div>
    <div>
        <h1>Login</h1>
        <form action="/login" method="POST"> <!--az az url amin keresztül regisztrálunk új felhasználót-->
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="text" name="loginpassword" placeholder="password">
            <button>Log in</button>
        </form>
    </div>
@endauth
</body>
</html>
