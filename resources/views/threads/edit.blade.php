<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>スレッド編集</title>

    <style>
        body {
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
            font-family: Arial, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 3px solid #333;
        }

        .form-group {
            margin-top: 25px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
            margin-top: 8px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .error-list {
            color: #c00;
            padding-left: 20px;
        }

        .back-link {
            margin-top: 25px;
        }

        .back-link a {
            color: #0645ad;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>スレッドを編集する</h1>

    @if ($errors->any())

        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="/threads/{{ $thread->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="title">
                スレッドタイトル
            </label>

            <br>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $thread->title) }}"
            >

        </div>

        <button type="submit">
            更新する
        </button>

    </form>

    <p class="back-link">
        <a href="/threads/{{ $thread->id }}">
            ← スレッドに戻る
        </a>
    </p>

</div>

</body>
</html>