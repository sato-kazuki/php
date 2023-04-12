<?php

require_once('./DB.php');

class Authentication
{
    public static function isLogin($id, $pass){
        //validate
        if(('' === $id)||(''=== $pass)){return false;}
		//DBハンドルを取得する
        $dbh = DB::getHandle();
		//var_dump($dbh);
		//DBからIDとpasswordを取得する（SQL発行）
        //準備された文(プリペアドステートメント)の作成
        $sql = 'SELECT * FROM users WHERE login_id = :login_id ;';
		$pre = $dbh->prepare($sql);
		//プレースホルダへの値のバインド
        $pre->bindValue(':login_id', $id);
        //SQLの実行
		$r = $pre->execute();
		//データの取得
		$user = $pre->fetch();
		//var_dump($user); exit;

        //user_idがなければログイン不可
        if(false === $user) {
			return false;
		}

        //入力されたpassとDBのpassを比較する
        if(false === password_verify($pass, $user['password'])){
			return false;
			}
		unset($user['password']);
		unset($user['login_id']);
		static::$user = $user;
        return true;
    }
	public static function getUser() {
		return static::$user;
	}
private static $user = null;
}