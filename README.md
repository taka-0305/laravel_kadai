# Laravel ブログサイト　簡易マニュアル　飛田貴之

Laravelを使用して簡単なブログサイトを制作しました。  
Dockerでの環境構築やMVCモデルの理解などに苦労しましたが、なんとか形になりました。  
記事の本文作成機能にはwysiwygエディタのQuillを使用しております。

## 環境構築
### ソースコード取得
コマンドプロンプトを起動し、ソースコードを保管しておきたい場所に移動し、githubからソースコードをcloneで取得する
```
#例
cd C:\Users\username
```
```
git clone https://github.com/taka-0305/laravel_kadai
```
### Docker環境構築
Docker Desktopをインストールする。  
詳しくはこちら https://zenn.dev/seiya0/articles/tech-docker-desktop-for-win-install  
インストール出来たらコマンドプロンプトでDocker環境を構築する。
「ソースコード取得」で移動したフォルダの中にgithubから取得したフォルダが生成されているのでそちらに移動する。
```
#例
cd C:\Users\username\laravel_kadai
```
移動出来たらDocker環境を構築する
```
docker compose up -d
```
下のように表示されれば成功
```
[+] Running 5/6
 - Network sitetest_default                Created
 ✔ Container laravel_mysql_container       Started
 ✔ Container sitetest-node-1               Started
 ✔ Container laravel_phpmyadmin_container  Started
 ✔ Container sitetest-php-1                Started
 ✔ Container sitetest-nginx-1              Started
```
srcの中にあるsampleBLogSiteフォルダに移動し、.env.exampleをコピーして.envファイルを作成する。  
DB設定を以下のようにする。
```
DB_HOST=db
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password
```
成功したら生成したPHPのコンテナ内に入る。
```
docker-compose exec php bash
```
コンテナ内に入ったらLaravelのコードのあるファイルまで移動する
```
root@f19639a6fd34:/var/www# cd ./sampleBlogSite
```
移動したらパッケージをインストールする
```
root@f19639a6fd34:/var/www/sampleBlogSite# composer install
```
インストール出来たらAPP_KEYを更新する
```
php artisan key:generate
```
データベースのテーブルを生成するためにマイグレーションを行う
```
root@f19639a6fd34:/var/www/sampleBlogSite# php artisan migrate
```
マイルレーション出来たら初期データを入れるためにシーディングを実行する
```
root@f19639a6fd34:/var/www/sampleBlogSite# php artisan db:seed
```
成功したらphpコンテナから出る。
```
root@f19639a6fd34:/var/www/sampleBlogSite# exit
```
Laravelプロジェクトのあるファイルに移動する
```
cd ./src/sampleBlogSite
```
Viteのセットアップを行う。
```
npm install vite --save-dev
```
npm run devを実行するとログイン機能などが利用できる。
```
npm run dev
``` 

ここまで来たら  
http://localhost/ にアクセスして起動できるか確認する。  
また http://localhost:3000/ にアクセスしてログインしテーブルが作成されているかphpmyadminで見る。  
ユーザ名 user パスワード password  
確認出来たら http://localhost/login に移動し、右上のRegisterから管理者アカウントを追加する。
アカウントを作成しログインできれば記事の作成などが出来るようになる。

## 訪問者
TOPページから記事を閲覧可能。
サムネイル画像またはタイトルをクリックすることで記事詳細画面へ。
 
## 管理者
http://127.0.0.1:8000/login からログイン。

### サンプルユーザ
メールアドレス：test@gmail.com
パスワード：testtest

### ログイン後

ログインできれば http://127.0.0.1:8000/myPage へ移動する。
  
  
「プロフィール作成」ボタンからプロフィールの作成または更新ができる。  
こちらのプロフィールはTOPページや記事詳細ページに表示される。
  
  
「新規投稿」ボタンから、記事の新規投稿ができる。  
記事のタイトル、本文、サムネイル画像が設定できる。
  
  
下のテーブルから現在公開している記事を確認できる。  
「詳細」ボタンを押すと記事詳細ページへ。  
「編集」を押すと記事の更新ができる。
  
ログイン後はTOPページ等にアクセスすると上に新規投稿、マイページへとクリックすると移動できる管理者バーが表示される。
   
### phpMyAdmin
http://127.0.0.1:3000/ からログインすることでphpMyAdminを使用できる
