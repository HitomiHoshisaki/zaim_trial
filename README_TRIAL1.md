# README_TRIAL1

## ■ 開発内容

Zaim API を使ったWebアプリケーション。





## ■ 開発にかかった時間

APIとプログラムを直接触るようになってからは15時間くらい？  
その前にAnsibleやAWS、CakePHPについて学ぶ時間も別に作りました。  
合計30時間くらいでしょうか。





## ■ 工夫した点

### 1. actionを細かく分けたこと。

シンプルな機能しかまだつけていませんが、  
いくらでも機能を追加していけそうです。  
拡張性を持たせるためにactionは極力小さくしました。



### 2. Qiitaにまとめながら作業を進めたこと。

プログラムと直接は関係ありませんが、  
今回は一気に勉強することがたくさんあったので  
あとで混乱したり忘れたりして困ることが予想できました。  
Qiitaにメモを残しながら祖業を進めたので、  
同じところにハマり続けることなく思考できました。  





## ■ AWSでの動作確認方法

### 1. TOPページ

ブラウザでこちらにアクセスするだけで動作確認をしていただけます。  
[http://13.114.178.205/](http://13.114.178.205/)

![ログイン画面](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_1.png)



### 2. ログイン認証

お手持ちのZaimアカウントをご利用いただけます。  
動作確認をするだけでしたら、こちらのテストアカウントをご活用ください。  

	メールアドレス	zaim.trial@gmail.com
	パスワード		zaimtrial

![ログイン認証](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_2.png)

　　

### 2. 当月の履歴

ログインすると、まず当月の入力履歴が表示されます。  
「前月」「翌月」ボタンをクリックすると、別の月に遷移します。

![当月の履歴](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_3.png)



### 3. 支出登録

日付/金額/カテゴリ&ジャンルだけのシンプルな登録ができます。

![支出登録](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_4.png)

![支出登録完了](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_5.png)



### 4. まとめて削除

チェックボックスを使うと、不要になった入力履歴を削除できます。

![まとめて削除](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_6.png)

![まとめて削除完了](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_7.png)





## ■ 仮想マシンでの動作確認方法

VirtualBox + Vagrant + Ansible で環境を構築しました。



### 1. 仮想マシンの起動

	# GitHubから当リポジトリをクローン。
	$ git clone https://github.com/HitomiHoshisaki/zaim_trial

	# VirtualBoxのバージョンを調べる。 
	$VBoxManage -v

	# 　入っていなければ、下記サイトからVirtualBoxの最新版(5.2)をダウンロード、インストール。
	# https://www.virtualbox.org/

	# vagrant が入っているか確認。
	$ vagrant -v

	# 入っていなければ、下記サイトからVagrantの最新版(2.1.1)をダウンロード。 
	# https://www.vagrantup.com/

	# trial1ディレクトリに移動
	$ cd /path/to/trial1/
	
	# 仮想マシンを起動。
	$ vagrant up

	# ssh接続できるか確認。
	$ vagrant ssh
	
	# 問題なければログアウトしておく。
	$ exit



### 2. 環境構築

	# ansibleが入っているか確認。
	$ ansible --version

	# ansibleが入っていなければ、pipをインストール。
	$ sudo easy_install pip 

	# pipでAnsible最新版(2.5.4)をインストール。
	$ sudo pip install ansible

	# playbookを実行。
	$ ansible-playbook playbook.yml
	
	# 最初と途中で、パスワードを2回聞かれる。
	$ vagrant



### 3. TOPページ

ブラウザでこちらにアクセスすると動作確認をしていただけます。  
[http://192.168.33.10/](http://192.168.33.10/)

![ログイン画面](https://raw.githubusercontent.com/HitomiHoshisaki/zaim_trial/master/img/trial1_1.png)

※以降は前述の「AWSでの動作確認方法」と同様です。
