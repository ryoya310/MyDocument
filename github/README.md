# GitHubとVPSの連携

## 連携方法

### 1. GitHub リポジトリ作成
https://github.com/user/repo

### 2. サーバーでSSH鍵の作成・確認（セキュリティ方針は随時変わる可能性あり）
```
$ ls ~/.ssh
$ ssh-keygen -t ed25519 -C "email@example.com"
$ cat ~/.ssh/id_ed25519.pub
```

### 3. GitHub にSSH鍵を登録
https://github.com/settings/keys

### 4. SSH接続確認
```
$ ssh -T git@github.com
```

## サーバーにファイルを設置

### 1. クローン
```
$ cd ~/path/repo
$ git clone git@github.com:user/repo.git
```

### 2. 確認
```
$ git remote -v
# ※SSHでcloneしている場合はこの時点でgit@github.com:〜になっていればOK
$ git remote set-url origin git@github.com:user/repo.git  # 必要な場合のみ
$ ssh -T git@github.com
$ git remote -v
```

## デプロイ

### 1. ファイル権限 → 更新
```
$ cd ~/path/repo
$ chmod +x ./deploy.sh
$ ./deploy.sh
```