# 2ch風掲示板

Laravelを使って開発している、2ch風のローカル掲示板アプリです。

## 概要

スレッドを作成し、一覧から確認できるシンプルな掲示板を作っています。

現在は基本的なスレッド作成・一覧表示機能を実装しています。

## 現在実装されている機能

- スレッド一覧表示
- スレッド作成
- スレッドタイトルのバリデーション
- MySQLへのデータ保存

## 使用技術

- Laravel
- PHP
- MySQL
- Docker
- Docker Compose
- Blade
- Git / GitHub

## 環境構築

Docker Desktopを起動した状態で、プロジェクトディレクトリから以下を実行します。

```bash
docker compose up -d