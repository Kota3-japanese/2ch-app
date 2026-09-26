<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>2ch風掲示板</title>
</head>
<body>

    <h1>2ch風掲示板</h1>

    <h2>スレッド一覧</h2>

    @if ($threads->isEmpty())
        <p>まだスレッドがありません。</p>
    @else
        <ul>
            @foreach ($threads as $thread)
                <li>
                    <a href="/threads/{{ $thread->id }}">
                        {{ $thread->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>