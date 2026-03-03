#!/bin/bash
# DBエクスポート - 管理画面の変更をGitで共有するために使用

set -e

docker compose exec mysql mysqldump \
  -u wp_user -pwp_password \
  takahashi_womens > db/dump.sql

echo "エクスポート完了: db/dump.sql"
