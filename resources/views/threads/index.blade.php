<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>2ch風掲示板</title>

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

        h2 {
            margin-top: 30px;
            font-size: 20px;
        }

        .create-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .create-button:hover {
            background-color: #555;
        }

        .thread-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .thread-item {
            padding: 15px 10px;
            border-bottom: 1px solid #ddd;
        }

        .thread-title {
            font-size: 17px;
            color: #0645ad;
            text-decoration: none;
        }

        .thread-title:hover {
            text-decoration: underline;
        }

        .post-count {
            margin-left: 10px;
            color: #777;
            font-size: 14px;
        }

        .empty-message {
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>2ch風掲示板</h1>

    <p>
        <a href="/threads/create" class="create-button">
            新しいスレッドを作成する
        </a>
    </p>

    <h2>スレッド一覧</h2>

    @if ($threads->isEmpty())

        <p class="empty-message">
            まだスレッドがありません。
        </p>

    @else

        <ul class="thread-list">

            @foreach ($threads as $thread)

                <li class="thread-item">

                    <a
                        href="/threads/{{ $thread->id }}"
                        class="thread-title"
                    >
                        {{ $thread->title }}
                    </a>

                    <span class="post-count">
                        （レス {{ $thread->posts_count }}）
                    </span>

                </li>

            @endforeach

        </ul>

    @endif

</div>

</body>
</html>