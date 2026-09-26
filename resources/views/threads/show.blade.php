<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $thread->title }}</title>
</head>
<body>

    <h1>{{ $thread->title }}</h1>

    <h2>スレッド内投稿一覧</h2>

    @if ($thread->posts->isEmpty())
        <p>まだ投稿がありません。</p>
    @else
        <ul>
            @foreach ($thread->posts as $post)
                <li>
                    {{ $post->body }}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="/threads">スレッド一覧に戻る</a>
    </p>

</body>
</html>