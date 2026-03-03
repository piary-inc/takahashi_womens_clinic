#!/bin/bash
# DBインポート - 他の開発者のDB変更を取り込む

set -e

if [ ! -f db/dump.sql ]; then
  echo "エラー: db/dump.sql が見つかりません"
  exit 1
fi

docker compose exec -T mysql mysql \
  -u wp_user -pwp_password \
  takahashi_womens < db/dump.sql

echo "インポート完了"
