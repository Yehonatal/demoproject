<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Minimal Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            /* justify-content: center; */
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .container{
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(30, 30, 30, 0.1);
            margin-bottom: 20px;
            max-width: 300px;
            width: 100%;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        h2, h3 {
            color: #424242;
            margin-bottom: 20px;
        }

        .status {
            text-transform: uppercase;
            opacity: 0.25;
            font-weight: bold;
        }

        .create_post_container {
            border: 1px solid #ddd;

            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(30, 30, 30, 0.1);
        }

        textarea {
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
            resize: vertical;
        }


        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .post_container {
            margin-top: 1em;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            margin: 20px;
        }

        .post {
            margin: 10px;
            border-radius: 5px;
            padding: 20px;
            border: 1px solid #ddd;
            background: white;
        }

        .post_bottom {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: fit-content;
            gap: 10px;
        }



        .post_bottom div {
            width: 45px;
            padding: 7.5px;
            border: 1px solid blue;
            border-radius: 5px;
        }

        @media (min-width: 642px ){
            .post_container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px ){
            .post_container {
                grid-template-columns: repeat(3, 1fr);
            }
        }


    </style>
</head>

<body>

    @auth
    <h1>TESTING COMPLETE</h1>
    <p class="status">User logged in successfully  . . .</p>

    <form action="/logout" method="POST" class="handler_logout">
        @csrf
        <button>Log out</button>
    </form>

    <br>

    <div class="create_post_container"  >
        <h2>CREATE NEW POST</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post: Title">
            <textarea name="body" id="" rows="10" placeholder="Post: Content"></textarea>
            <button>Create</button>
        </form>
    </div>

    <h2>ALL POSTS</h2>
    <div class="post_container">
        @foreach($posts as $post)
            <div class="post">
                <h3>{{$post["title"]}}</h3>
                <p>{{$post["body"]}}</p>
                <p>{{$post["created_at"]}}</p>

                <div class="post_bottom">
                    <div>
                        <a href="/edit-post/{{$post->id}}">Edit</a>
                    </div>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Remove</button>
                    </form>
                </div>
            </div>

        @endforeach
    </div>

    @else
    <p  class="status">Waiting for the user to register or login . . .</p>

    <div class="container">
        <h2>REGISTER</h2>
        <form action="/register" method="POST" class="form_handler">
            @csrf
            <input type="text" name="name" id="username" placeholder="Username">
            <br>
            <input type="email" name="email" id="email" placeholder="Email">
            <br>
            <input type="password" name="password" id="password" placeholder="Password">
            <br>
            <br>
            <button id="register_btn">Register</button>
        </form>
    </div>

    <div class="container">
        <h2>LOGIN</h2>
        <form action="/login" method="POST" class="form_handler">
            @csrf
            <input type="text" name="loginname" id="username" placeholder="Username">
            <br>
            <input type="password" name="loginpassword" id="password" placeholder="Password">
            <br>
            <br>
            <button id="login_btn">Login</button>
        </form>
    </div>

    @endauth

</body>

</html>
