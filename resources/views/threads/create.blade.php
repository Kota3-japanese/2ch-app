<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新しいスレッド</title>
</head>
<body>

    <h1>新しいスレッドを作る</h1>

    <form action="/threads" method="POST">
        @csrf
        
        <label for="title">スレッドタイトル</label>
        <br>

        <input
            type="text"
            id="title"
            name="title"
        >

        <br><br>

        <button type="submit">
            作成する
        </button>
    </form>

    <p>
        <a href="/threads">スレッド一覧に戻る</a>
    </p>

</body>
</html>