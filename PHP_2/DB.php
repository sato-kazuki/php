<?php

class DB {

	protected function __construct(){
	}

    static public function getHandle() {


        static $obj = null;

        if(null === $obj) {
			$dsn  = 'mysql:dbname=game_2018;host=localhost;charset=utf8mb4';
			$user = 'game_2018';
			$pass = 'game_2018';

			$opt = [
    		// 静的プレースホルダを指定
    			PDO::ATTR_EMULATE_PREPARES => false,
			];
			//
			try {
    			$obj = new PDO($dsn, $user, $pass, $opt);
			} catch (PDOException $e) {
    			echo 'DB Connect error: ', $e->getMessage();
    			exit;
			}



		}
		return $obj;
    }
}