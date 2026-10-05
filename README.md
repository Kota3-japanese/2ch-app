# 2ch風掲示板

Laravelを使って作った2ch風の掲示板です。

スレッドを作成して、スレッド内に投稿できるようにしました。
スレッドや投稿の削除、スレッドタイトルの編集もできます。

## 使用したもの

- Laravel
- PHP
- MySQL
- Docker
- Git / GitHub

## できること

### スレッド

- スレッド一覧を見る
- スレッドを作成する
- スレッドの詳細を見る
- スレッドタイトルを編集する
- スレッドを削除する
- スレッドごとのレス数を見る

### 投稿

- スレッドに投稿する
- 投稿を見る
- 投稿を削除する

スレッドを削除すると、そのスレッドにある投稿も一緒に削除されます。

## 画面

### スレッド一覧

作成されているスレッドを一覧で表示します。

### スレッド作成

タイトルを入力して新しいスレッドを作成できます。

### スレッド詳細

スレッド内の投稿を表示します。
ここから投稿の作成や削除、スレッドの編集・削除ができます。

### スレッド編集

スレッドのタイトルを変更できます。

## ディレクトリ

主に以下のファイルを使用しています。

```text
app/
└── Http/
    └── Controllers/
        └── ThreadController.php

app/
└── Models/
    ├── Thread.php
    └── Post.php

resources/
└── views/
    └── threads/
        ├── index.blade.php
        ├── create.blade.php
        ├── show.blade.php
        └── edit.blade.php

routes/
└── web.php

database/
└── migrations/