<?php

$raw_pass = 'password';
//DBに保存するパスワードの処理方法
//↓NG例
//$saved_pass=$raw_pass;//生パスワード保存
//いわずもがな危険な保存方法
//$saved_pass = md5($raw_pass);//MD5によるハッシュ
//$saved_pass = sha1($raw_pass);//SHA-1によるハッシュ
//マシンパワーによってはこれらも逆引きされかねないのでNG
//$salt = 'abcdfg';//個別のソルト
//$saved_pass = md5($salt . $raw_pass);//塩付きMD5によるハッシュ
//$saved_pass = sha1($salt . $raw_pass);//塩付きSHA-1によるハッシュ
//これもまだまだ危険
//$salt = uniqid();//個別のソルト
//$saved_pass = md5($salt . $raw_pass);//塩付きMD5によるハッシュ
//$saved_pass = sha1($salt . $raw_pass);//塩付きSHA-1によるハッシュ
//これもまだマシ程度?
//$salt = uniqid();//個別のソルト
//$salt = md5(random_bytes(64));//ソルトをハッシュしてある程度強化
//$saved_pass = md5($salt . $raw_pass);//塩付きMD5によるハッシュ
//$saved_pass = sha1($salt . $raw_pass);//塩付きSHA-1によるハッシュ
//まぁマシ?
//$salt = md5(random_bytes(64));
//$saved_pass = $raw_pass;
//for($i = 0; $i < 1000; ++$i){
	//$saved_pass = sha1($salt . $saved_pass);//ストレッチ
	//↓こっちのがいい
	//$saved_pass = hash('sha512',$salt . $saved_pass);
//}
//var_dump($saved_pass);
//これくらいがいい

//$saved_pass = password_hash($raw_pass,PASSWORD_DEFAULT);
//これが本命、基本的にはこれでいいらしい





