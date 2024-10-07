<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Ruyxatdan utish</h2>
    <form action="{{route('utish.create') }}" method="POST">
        @csrf
        <label for="username">Ismingiz:</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required>

                 @if($errors->has('username'))
                 <p style="color: red;">{{ $errors->first('username') }}</p>
                 @endif

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required >

                    @if($errors->has('email'))
                    <p style="color: red;">{{ $errors->first('email') }}</p>
                    @endif

        <label for="password">Parol:</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" required>

                        @if($errors->has('password'))
                        <p style="color: red;">{{ $errors->first('password') }}</p>
                        @endif

        <input type="submit" value="Ruyxatdan utish">
    </form>
    <a href="/login">Kirish</a>
</div>

</body>
</html>
