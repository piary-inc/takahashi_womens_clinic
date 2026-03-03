# 高橋ウィメンズクリニック コーポレートサイト

WordPress自作テーマによるコーポレートサイト。

## 技術スタック

| カテゴリ | 技術 | バージョン |
|---------|------|-----------|
| CMS | WordPress | 6.9.1 |
| PHP | PHP | 8.4 |
| DB | MySQL | 8.0 |
| ビルド | Vite | 6 |
| CSS | Tailwind CSS | v4 |
| JS | Alpine.js | 3 |
| JS | jQuery | WordPress同梱 |
| パッケージ管理 | npm | - |

## Docker環境

### コンテナ構成

| コンテナ | イメージ | ポート | 用途 |
|---------|---------|-------|------|
| wordpress | wordpress:6.9.1-php8.4-apache | 8080 | WordPress本体 (Apache内蔵) |
| mysql | mysql:8.0 | 3306 | データベース |
| phpadminer | adminer | 8081 | DB管理ツール |
| mailhog | mailhog/mailhog | 8025 (UI) / 1025 (SMTP) | メールテスト |
| wpcli | wordpress:cli-php8.4 | - | WordPressコマンド管理 |
| node | node:20-alpine | 5173 | Vite開発サーバー |

### サービスURL

| サービス | URL |
|---------|-----|
| WordPress | http://localhost:8080 |
| WordPress管理画面 | http://localhost:8080/wp-admin |
| phpAdminer | http://localhost:8081 |
| MailHog | http://localhost:8025 |
| Vite HMR | http://localhost:5173 |

## セットアップ

### 1. 環境変数の確認

`.env`ファイルにDB認証情報等が定義済み。必要に応じて編集。

### 2. Docker起動

```bash
docker compose up -d
```

### 3. WordPressの初期インストール

```bash
docker compose run --rm wpcli wp core install \
  --url="http://localhost:8080" \
  --title="高橋ウィメンズクリニック" \
  --admin_user=admin \
  --admin_password=admin \
  --admin_email=admin@example.com \
  --locale=ja
```

管理画面: http://localhost:8080/wp-admin (user: `admin` / pass: `admin`)

### 4. テーマの有効化

```bash
docker compose run --rm wpcli wp theme activate takahashi-womens
```

### 5. 動作確認

- http://localhost:8080 でテーマが適用されていることを確認
- `docker compose logs node` でVite開発サーバーの起動を確認
- CSS/JSを編集し、HMRでブラウザが自動更新されることを確認

## 開発コマンド

> **重要**: `docker-compose`（ハイフン付き/v1）ではなく `docker compose`（スペース/v2）を使用すること。v1は互換性問題あり。

```bash
# Docker環境の起動
docker compose up -d

# Docker環境の停止
docker compose down

# コンテナの再作成（設定変更後）
docker compose up -d --force-recreate wordpress

# コンテナログ確認
docker compose logs -f [service]

# WP-CLIの実行
docker compose run --rm wpcli wp [command]

# 本番ビルド (Nodeコンテナ内)
docker compose exec node npm run build

# npmパッケージ追加 (Nodeコンテナ内)
docker compose exec node npm install [package]
```

## かんたん操作 (wp.sh)

`./wp.sh`で主要な操作をシンプルに実行できる。

```bash
./wp.sh start          # 環境の起動
./wp.sh stop           # 環境の停止

./wp.sh plugin-add contact-form-7    # プラグイン追加
./wp.sh plugin-remove contact-form-7 # プラグイン削除
./wp.sh plugin-list                  # プラグイン一覧

./wp.sh db-export      # DB保存
./wp.sh db-import      # DB取り込み

./wp.sh log            # エラーログ表示
./wp.sh help           # コマンド一覧
```

### プラグインの追加手順

1. プラグイン名を確認する（WordPress公式サイトのURLスラッグ）
   ```
   https://wordpress.org/plugins/classic-editor/
                                 ^^^^^^^^^^^^^^ ← これがプラグイン名
   ```

2. インストール
   ```bash
   ./wp.sh plugin-add classic-editor
   ```

3. `init_start.sh`の「プラグインのインストール」セクションに追記
   ```bash
   docker compose run --rm wpcli wp plugin install classic-editor --activate
   ```
   これにより新しい開発者が`./init_start.sh`を実行した時にも同じプラグインが入る。

## プロジェクト構成

```
├── docker-compose.yml              # Docker構成
├── .env                            # 環境変数 (DB認証等)
├── logs/                           # WordPressエラーログ出力先
│   └── debug.log                   # PHPエラーログ (自動生成)
├── docker/
│   └── wordpress/
│       ├── Dockerfile              # WordPress + msmtp (MailHog連携)
│       └── msmtprc                 # MailHog SMTP設定
└── themes/
    └── takahashi-womens/           # WordPressテーマ
        ├── style.css               # テーマ宣言
        ├── functions.php           # テーマ関数 (Vite連携)
        ├── header.php              # ヘッダーテンプレート
        ├── footer.php              # フッターテンプレート
        ├── index.php               # メインテンプレート
        ├── package.json            # npm依存関係
        ├── vite.config.js          # Vite設定 (Docker HMR対応)
        └── src/
            ├── css/app.css         # Tailwind CSSエントリ
            └── js/app.js           # JSエントリ (Alpine.js + jQuery)
```

## テーマ開発

### Vite連携の仕組み

`functions.php`内で`WP_DEBUG`の値に応じてアセットの読み込み先を自動切替する。

- **開発時** (`WP_DEBUG = true`): Vite開発サーバー (http://localhost:5173) からHMR付きで配信
- **本番時** (`WP_DEBUG = false`): `dist/`ディレクトリのビルド済みアセットを読み込み

Nodeコンテナ（Vite）は`docker compose up -d`で自動起動する。`src/`配下のファイルを編集するとブラウザに自動反映される。

### Tailwind CSS v4

`@tailwindcss/vite`プラグインによるゼロコンフィグ設定。`tailwind.config.js`・`postcss.config.js`は不要。

```css
/* src/css/app.css */
@import "tailwindcss";
```

カスタマイズは`app.css`内の`@theme`ディレクティブで定義する。

```css
@import "tailwindcss";

@theme {
  --color-primary: #1a73e8;
  --font-family-body: "Noto Sans JP", sans-serif;
}
```

### CSSファイルの分割

`src/css/`配下にファイルを追加し、`app.css`からインポートすればViteが自動でコンパイルする。

```css
/* src/css/app.css */
@import "tailwindcss";
@import "./base.css";
@import "./layout/header.css";
```

**注意**: `@import`文の末尾にはセミコロン(`;`)が必須。

### Alpine.js

npmモジュールとしてインストールし、`src/js/app.js`で初期化。

```js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```

テンプレート内で`x-data`, `x-show`, `@click`等のディレクティブを使用可能。

### jQuery

WordPress同梱のjQueryを使用。`functions.php`で`wp_enqueue_script('jquery')`により読み込み済み。
`src/js/app.js`内でグローバルの`jQuery`を参照する。

```js
jQuery(function ($) {
  $(".target").on("click", function () {
    // 処理
  })
})
```

**注意**: Viteのモジュールスクリプト内では`$`ではなく`jQuery`でアクセスすること。

### JSファイルの分割

CSS同様、`src/js/`配下にファイルを追加し、`app.js`からインポートできる。

```js
// src/js/app.js
import './modal.js'
import './accordion.js'
```

## 開発ツール

### phpAdminer (DB管理)

http://localhost:8081 でアクセス。

| 項目 | 値 |
|------|-----|
| サーバー | `mysql`（docker-compose.ymlのサービス名） |
| ユーザー名 | `.env`の`DB_USER` |
| パスワード | `.env`の`DB_PASSWORD` |
| データベース | `.env`の`DB_NAME` |

### MailHog (メールテスト)

WordPressからのメール送信はmsmtp経由でMailHogに転送される。プラグイン不要。
http://localhost:8025 で送信されたメールを確認できる。

### エラーログ

WordPressのPHPエラーは `logs/debug.log` に自動出力される。

```bash
# ログの確認
cat logs/debug.log

# リアルタイム監視
tail -f logs/debug.log
```

Apacheログはコンテナログで確認する。

```bash
docker compose logs -f wordpress
```

JSのエラーはブラウザのDevTools（F12）→ Consoleで確認する。

## WordPress設定

### wp-config.php

手動作成不要。WordPress公式Dockerイメージが`docker-compose.yml`の環境変数から自動生成する。
本番環境ではレンタルサーバーのWordPressインストーラーが生成するため、Git管理の対象外。

### favicon

WordPress管理画面から設定する。テーマ側での`<link rel="icon">`の記述は不要。

**外観 → カスタマイズ → サイト基本情報 → サイトアイコン**（512x512px以上の画像をアップロード）

## DB共有（チーム開発）

WordPress管理画面での変更（メニュー、固定ページ、設定等）はDBに保存されるため、テーマファイルとは別にDB同期が必要。

### 初期設定の共有

`init_start.sh`にWP-CLIコマンドとして定義済み。パーマリンク等の基本設定は初回セットアップ時に自動適用される。

```bash
# 設定を追加する場合は init_start.sh に追記
docker compose run --rm wpcli wp rewrite structure '/%postname%/'
docker compose run --rm wpcli wp option update blogdescription 'キャッチフレーズ'
```

### 開発中のDB同期

SQLダンプで共有する。

```bash
# エクスポート（管理画面で変更した後に実行）
./db/export.sh

# インポート（他の開発者の変更を取り込む）
./db/import.sh
```

### 運用フロー

```
開発者A: 管理画面で変更 → ./db/export.sh → git commit → git push
開発者B: git pull → ./db/import.sh → 変更が反映される
```

`db/dump.sql`はGit管理対象。コーポレートサイト規模であれば容量は問題ない。
ただしコミットの度にダンプ全体が差分記録されるため、区切りのよいタイミング（ページ追加後、メニュー変更後など）でエクスポートする。

### バックアップと復元

`./db/import.sh`実行時に`db/backup/`へタイムスタンプ付きバックアップが自動作成される。
復元が必要な場合は以下を実行する。

```bash
docker compose exec -T mysql mysql \
  -u wp_user -pwp_password \
  takahashi_womens < db/backup/backup_20260303_123456.sql
```

`db/backup/`はGit管理対象外。

## Git管理ルール

### 開発フロー

```
1. GitHubでissueを起票
2. issueからブランチを作成
3. 開発・コミット
4. Pull Requestを作成
5. mainにマージ
```

### ブランチ命名規則

```
feature/issue-{番号}
```

例: `feature/issue-12`

### コミットメッセージ

```
[種類] 変更内容
```

| 種類 | 用途 |
|------|------|
| [機能追加] | 新しい機能の追加 |
| [修正] | バグ修正 |
| [デザイン] | 見た目の変更 |
| [リファクタリング] | コード整理（動作変更なし） |
| [設定] | 設定・環境の変更 |
| [ドキュメント] | ドキュメントの更新 |

例:
```
[修正] トップページのレイアウト崩れを修正
[機能追加] お問い合わせフォームの追加
[デザイン] ヘッダーナビゲーションの色変更
[設定] classic-editorプラグインの追加
```

## デプロイ

### 方針

- **レンタルサーバー**にWordPress本体をインストール
- **自作テーマのみ**をGitHub Actions経由でCI/CDデプロイ
- WordPress本体・プラグインはサーバー上で管理

### CI/CDフロー (予定)

```
main push → GitHub Actions → npm run build → rsync/SFTP → レンタルサーバー
```

転送対象はビルド済みテーマファイルのみ (`node_modules/`, `src/`, `vite.config.js`等は除外)。

> **Note**: レンタルサーバー確定後にGitHub Actionsワークフローを作成予定。
