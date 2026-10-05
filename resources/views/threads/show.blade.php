<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $thread->title }}</title>

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

        .post {
            padding: 15px 10px;
            border-bottom: 1px solid #ddd;
        }

        .post-header {
            margin-bottom: 8px;
        }

        .post-number {
            font-weight: bold;
            color: #333;
        }

        .post-date {
            margin-left: 10px;
            color: #777;
            font-size: 13px;
        }

        .post-body {
            margin: 5px 0 10px;
            white-space: pre-wrap;
        }

        .empty-message {
            color: #777;
        }

        .post-form {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
        }

        textarea {
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            padding: 10px;
            font-size: 15px;
            resize: vertical;
        }

        button {
            margin-top: 10px;
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

        .delete-post-button {
            background-color: #b33;
            padding: 6px 12px;
            font-size: 13px;
        }

        .delete-post-button:hover {
            background-color: #d55;
        }

        .delete-thread-button {
            background-color: #8b0000;
        }

        .delete-thread-button:hover {
            background-color: #b00000;
        }

        .error-list {
            color: #c00;
            padding-left: 20px;
        }

        .back-link {
            margin-top: 20px;
        }

        .back-link a {
            color: #0645ad;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>{{ $thread->title }}</h1>

    <h2>スレッド内投稿一覧</h2>

    @if ($thread->posts->isEmpty())

        <p class="empty-message">
            まだ投稿がありません。
        </p>

    @else

        @foreach ($thread->posts as $post)

            <div class="post">

                <div class="post-header">

                    <span class="post-number">
                        {{ $loop->iteration }} ：名無しさん
                    </span>

                    <span class="post-date">
                        {{ $post->created_at->format('Y-m-d H:i:s') }}
                    </span>

                </div>

                <p class="post-body">
                    {{ $post->body }}
                </p>

                <form
                    action="/threads/{{ $thread->id }}/posts/{{ $post->id }}"
                    method="POST"
                    onsubmit="return confirm('この投稿を削除しますか？');"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="delete-post-button"
                    >
                        削除
                    </button>
                </form>

            </div>

        @endforeach

    @endif


    <div class="post-form">

        <h2>投稿する</h2>

        @if ($errors->any())

            <ul class="error-list">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        @endif

        <form
            action="/threads/{{ $thread->id }}/posts"
            method="POST"
        >

            @csrf

            <textarea
                name="body"
                rows="5"
                placeholder="投稿内容を入力してください"
            ></textarea>

            <br>

            <button type="submit">
                投稿する
            </button>

        </form>

    </div>


    <p>
        <a href="/threads/{{ $thread->id }}/edit">
            スレッドを編集する
        </a>
    </p>


    <form
        action="/threads/{{ $thread->id }}"
        method="POST"
        onsubmit="return confirm('このスレッドを削除しますか？');"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="delete-thread-button"
        >
            スレッドを削除する
        </button>

    </form>


    <p class="back-link">

        <a href="/threads">
            ← スレッド一覧に戻る
        </a>

    </p>

</div>

</body>
</html>