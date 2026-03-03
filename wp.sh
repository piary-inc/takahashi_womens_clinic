#!/bin/bash
# WordPress操作ヘルパー
# 使い方: ./wp.sh [コマンド]

set -e

case "$1" in
  start)
    echo "=== Docker環境の起動 ==="
    docker compose up -d
    echo "起動完了"
    ;;
  stop)
    echo "=== Docker環境の停止 ==="
    docker compose down
    echo "停止完了"
    ;;
  plugin-add)
    if [ -z "$2" ]; then
      echo "使い方: ./wp.sh plugin-add プラグイン名"
      echo "例:     ./wp.sh plugin-add contact-form-7"
      exit 1
    fi
    PLUGIN_NAME="${2%/}"
    echo "=== プラグインのインストール: $PLUGIN_NAME ==="
    docker compose run --rm wpcli wp plugin install "$PLUGIN_NAME" --activate
    echo "完了"
    ;;
  plugin-remove)
    if [ -z "$2" ]; then
      echo "使い方: ./wp.sh plugin-remove プラグイン名"
      echo "例:     ./wp.sh plugin-remove contact-form-7"
      exit 1
    fi
    PLUGIN_NAME="${2%/}"
    echo "=== プラグインの削除: $PLUGIN_NAME ==="
    docker compose run --rm wpcli wp plugin deactivate "$PLUGIN_NAME"
    docker compose run --rm wpcli wp plugin delete "$PLUGIN_NAME"
    echo "完了"
    ;;
  plugin-list)
    echo "=== インストール済みプラグイン ==="
    docker compose run --rm wpcli wp plugin list
    ;;
  db-export)
    echo "=== DBエクスポート ==="
    ./db/export.sh
    ;;
  db-import)
    echo "=== DBインポート ==="
    ./db/import.sh
    ;;
  log)
    echo "=== エラーログ ==="
    tail -f logs/debug.log
    ;;
  help|*)
    echo "========================================="
    echo "  WordPress操作コマンド"
    echo "========================================="
    echo ""
    echo "  ./wp.sh start          環境の起動"
    echo "  ./wp.sh stop           環境の停止"
    echo ""
    echo "  ./wp.sh plugin-add     プラグイン追加"
    echo "  ./wp.sh plugin-remove  プラグイン削除"
    echo "  ./wp.sh plugin-list    プラグイン一覧"
    echo ""
    echo "  ./wp.sh db-export      DB保存"
    echo "  ./wp.sh db-import      DB取り込み"
    echo ""
    echo "  ./wp.sh log            エラーログ表示"
    echo "  ./wp.sh help           このヘルプ"
    echo ""
    ;;
esac
