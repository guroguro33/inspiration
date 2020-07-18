# Inspiration（インスピレーション）
 
## アプリケーションの概要
 
Laravelとvue.jsを使ったアイデアを売買できるサイトです。
[デモページ](https://inspiration-web.net/)

デモページでご利用ください

ログインID：kobayashi.kaori@example.net

パスワード：password

## 画面イメージ ##
 
![TOPイメージ](https://user-images.githubusercontent.com/48667277/87261630-eec0da00-c4f1-11ea-97c7-08e09710255b.png)
 
## 機能と環境
 
- 新規登録・ログイン・ログアウト・パスワードリマインダ
- ヒラメキ（アイデア）の出品に関するCRUD機能
- 模擬購入し、５段階評価とレビューの投稿機能
- ソート機能（Eloquent ORM）
- マイページ
- プロフィール編集機能
- プロフィール画像の保存（AWS S3）
- ページネーション（vuejs-paginate）
- 購入時や評価時のメール送信機能（Gmail SMTP）
- Twitterシェア機能
- お気に入り機能（axios）
- 多言語化対応（en,ja）
- 開発環境: laravel homestead（VirtualBox + Vagrant + Homestead）
- データベース: MySQL
- デモページ環境: AWS EC2,RDS,S3
 
## 必要要件
 
- php: 7.1.3
- Laravel: 5.8
- league/flysystem-aws-s3-v3: 1.0
- axios: 0.19
- jQuery: 3.2
- sass: 1.15.2
- vue: 2.5.17
- vue-i18n: 8.18.2
- webpack: 4.43.0
 
## 使い方

### 買うとき
1. トップページから出品されたヒラメキ（アイデア）の一覧を見る
2. 気になるヒラメキをクリックして詳細画面を確認（購入前は概要のみ閲覧可能）
3. ログイン後、購入可能
4. 購入後は、ヒラメキの詳細情報を見ることができる
5. 購入後は５段階評価やレビューを書き込みすることができる
6. ヒラメキ詳細画面にお気に入りボタンやTwitterシェアボタン有り

### 売るとき 
1. ログイン後、「ヒラメキを売る」をクリックし、出品画面を表示
2. タイトル、カテゴリー、概要、詳細、価格を入力し、出品する

## 設計資料
 
1. [要件定義](https://docs.google.com/spreadsheets/d/1piRnf7Fa1SdBqLWNyC4xSxoPCJLuCKwS26w3g9L8aYk/edit?usp=sharing)
2. [ER図](inspiration_ER図.drawio.pdf)
3. [テストケース](https://docs.google.com/spreadsheets/d/1gL3SI_5ySqqq4TMyr4XSRMHnCHmjCPQ_018HXRUT_Wo/edit?usp=sharing)
  
## 作者

* 作成者：くろすけ
* Twitter：[@guroguro33](https://twitter.com/guroguro33)
 
## ライセンス
 
"inspiration" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).