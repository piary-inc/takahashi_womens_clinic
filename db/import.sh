#!/bin/bash
# DBインポート - 他の開発者のDB変更を取り込む

set -e

if [ ! -f db/dump.sql ]; then
  echo "エラー: db/dump.sql が見つかりません"
  exit 1
fi

# インポート前にバックアップを作成
BACKUP_FILE="db/backup/backup_$(date +%Y%m%d_%H%M%S).sql"
mkdir -p db/backup

docker compose exec mysql mysqldump \
  -u wp_user -pwp_password \
  takahashi_womens > "$BACKUP_FILE"

echo "バックアップ作成: $BACKUP_FILE"

# インポート実行
docker compose exec -T mysql mysql \
  -u wp_user -pwp_password \
  takahashi_womens < db/dump.sql

echo "インポート完了"
