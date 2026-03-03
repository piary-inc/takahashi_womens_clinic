#!/bin/bash
# 高橋ウィメンズクリニック - 初回環境構築スクリプト

set -e

echo "=== Docker環境の起動 ==="
docker compose up -d

echo ""
echo "=== MySQLの起動待ち ==="
docker compose exec mysql mysqladmin ping -h localhost --wait=30 --silent
echo "MySQL準備完了"

echo ""
echo "=== WordPressの初期インストール ==="
docker compose run --rm wpcli wp core install \
  --url="http://localhost:8080" \
  --title="高橋ウィメンズクリニック" \
  --admin_user=admin \
  --admin_password=admin \
  --admin_email=admin@example.com \
  --locale=ja

echo ""
echo "=== テーマの有効化 ==="
docker compose run --rm wpcli wp theme activate takahashi-womens

echo ""
echo "=== WordPress初期設定 ==="
docker compose run --rm wpcli wp rewrite structure '/%postname%/'
docker compose run --rm wpcli wp option update blogdescription '高橋ウィメンズクリニック'

echo ""
echo "=== ログディレクトリの権限設定 ==="
chmod 777 logs

echo ""
echo "========================================="
echo "  セットアップ完了"
echo "========================================="
echo ""
echo "  WordPress:    http://localhost:8080"
echo "  管理画面:      http://localhost:8080/wp-admin"
echo "  phpAdminer:   http://localhost:8081"
echo "  MailHog:      http://localhost:8025"
echo ""
echo "  管理画面ログイン"
echo "    user: admin"
echo "    pass: admin"
echo ""
