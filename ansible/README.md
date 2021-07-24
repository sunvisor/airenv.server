### デプロイ方法

クライアントの変更がある場合は、必ず `sencha app build` を実行してからデプロイすること

```
ansible-playbook -l <server type> -t <tag> deploy.yml
```

#### server type

- production 本番サーバー
- staging さくらのクラウドサーバー (現在は存在しない)
- intra イントラネットサーバー

#### tag

- update: 更新する
- migrate: マイグレーションを実施する
- composer: composer install を実行する

例

```
ansible-playbook -l intra -t "update" deploy.yml
```
