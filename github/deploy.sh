#!/bin/bash

# gitリポジトリを更新
git pull

# 24時間以上前の全ての未使用のDockerオブジェクトを削除
docker system prune -a -f --filter "until=24h"

# 未使用のボリュームを削除
docker system prune --volumes -f

# Docker Composeでコンテナをビルドして起動
docker-compose -f docker-compose.prod.yml up -d --build

# デプロイ後にNginxコンテナを再起動
docker-compose -f docker-compose.prod.yml restart nginx
