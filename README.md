AirEnv api サーバー
==================

開発環境
-------

```
git clone 
```


### .env.local の作成

**app/.env.local** を作成

```
###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=ChangeMe!
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
DATABASE_URL="postgresql://airenv:airenv@postgres:5432/airenv?serverVersion=13&charset=utf8"
###< doctrine/doctrine-bundle ###
```

### docker でコンテナーを起動

```
docker-compose up
```

本番環境
------

CentOS7 のサーバーを立てて、ansible playbook を実行する

ansible/hosts でサーバーを指定できる

```
cd ansible
ansible-playbook site.yml
```

API 仕様
-------

### CO2 計測値登録

```
POST /add/co2/{place}/{value}
```

- CO2 計測データを追加する
- place は場所
- value は計測値

### 最新 CO2 計測値取得

```
GET /latest/co2/{place}
```

- 最新の CO2 計測値を取得する
- place は場所

レスポンス

```
{
  "date": "2021-07-27 18:30:53",
  "place": "home_office",
  "value": 410
}
```

### CO2 計測値リスト取得

```
GET /list/co2/{place}/{from}/{to}
```

- CO2 計測値のリストを取得する
- place は場所
- from は開始日時
- to は終了日時

リクエスト例

```
http://192.168.0.231/list/co2/home_office/2021-07-22T06:00:00/2021-07-30T09:00:00
```

レスポンス

```
[
  {
    "date": "2021-07-22 06:00:59",
    "place": "home_office",
    "value": 411
  },
    :
    : (中略)
    :
  {
    "date": "2021-07-27 18:34:02",
    "place": "home_office",
    "value": 400
  }
]
```
