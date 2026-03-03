# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

高橋ウィメンズクリニックのコーポレートサイト。WordPress自作テーマによる開発。

## Technology Stack

- **CMS**: WordPress 6.9.1
- **PHP**: 8.4
- **Database**: MySQL 8.0
- **Build**: Vite 6
- **CSS**: Tailwind CSS v4
- **JS**: Alpine.js 3 + jQuery
- **Package Manager**: npm

## Docker Containers

| Container | Image | Port | Purpose |
|-----------|-------|------|---------|
| WordPress | wordpress:6.9.1-php8.4-apache | 8080 | WordPress本体 (Apache内蔵) |
| MySQL | mysql:8.0 | 3306 | データベース |
| phpAdminer | adminer | 8081 | DB管理ツール |
| MailHog | mailhog/mailhog | 8025 (UI) / 1025 (SMTP) | メールテスト |
| WP-CLI | wordpress:cli-php8.4 | - | WordPressコマンド管理 |
| Node.js | node:20-alpine | 5173 | Vite + Tailwind CSSビルド |

## Development Commands

```bash
# Docker環境の起動
docker-compose up -d

# Docker環境の停止
docker-compose down

# コンテナログ確認
docker-compose logs -f [service]

# WP-CLIの実行
docker-compose run --rm wpcli wp [command]

# テーマの有効化
docker-compose run --rm wpcli wp theme activate takahashi-womens

# Vite開発サーバー (Nodeコンテナが自動起動)
docker-compose logs node

# 本番ビルド (Nodeコンテナ内で実行)
docker-compose exec node npm run build
```

## Service URLs

- **WordPress**: http://localhost:8080
- **phpAdminer**: http://localhost:8081 (server: `mysql`, user/pass: `.env`参照)
- **MailHog**: http://localhost:8025
- **Vite HMR**: http://localhost:5173

## Project Structure

```
├── docker-compose.yml          # Docker構成
├── .env                        # 環境変数 (DB認証等)
├── docker/
│   └── wordpress/
│       ├── Dockerfile          # WordPress + msmtp
│       └── msmtprc             # MailHog SMTP設定
└── themes/
    └── takahashi-womens/       # WordPressテーマ
        ├── style.css           # テーマ宣言
        ├── functions.php       # テーマ関数 (Vite連携)
        ├── header.php          # ヘッダーテンプレート
        ├── footer.php          # フッターテンプレート
        ├── index.php           # メインテンプレート
        ├── package.json        # npm依存関係
        ├── vite.config.js      # Vite設定
        └── src/
            ├── css/app.css     # Tailwind CSSエントリ
            └── js/app.js       # JSエントリ (Alpine.js)
```

## Theme Development

自作テーマ開発。以下の技術スタックで構成:
- **Vite**: CSS/JSのビルド・HMR (Docker内Nodeコンテナで稼働)
- **Tailwind CSS v4**: `@tailwindcss/vite`プラグインによるゼロコンフィグ設定
- **Alpine.js**: 軽量リアクティブJS (モーダル、アコーディオン、タブ等)
- **jQuery**: WordPress同梱のjQuery併用

### Vite連携の仕組み
- `functions.php`内で`WP_DEBUG`に応じてVite開発サーバー/ビルド済みアセットを自動切替
- 開発時: `http://localhost:5173`からHMR付きでアセット配信
- 本番時: `dist/`ディレクトリのマニフェストからアセット読み込み

## Development Requirements

- **コメント**: 日本語で記述
- **Gitコミット**: 日本語メッセージ
