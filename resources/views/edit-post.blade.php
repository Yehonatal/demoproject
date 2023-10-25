<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Minimal Design - Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        input[type="text"],
        textarea {
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

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST" class="container">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}">
        <textarea name="body" rows="10">{{$post->body}}</textarea>
        <button>Save Changes</button>
    </form>

</body>

</html>
