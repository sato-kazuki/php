<?php

//webブラゲーで使いやすい方法
//ob_start();
//session_start();//セッション開始

//セッションIDの確認
//var_dump(session_id());
//var_dump($_COOKIE);
/*Cookieとsessionの違い
Cookie
・HTTPで仕様が決まっている
・データはユーザ側に保存される
・長さ制限がある
・アプリだと扱いにくい
session
・HTTPで仕様が決まってない：言語毎に差異がある
・データの保存場所も不明：サーバ側が多い
・長さ制限は保存場所次第
・アプリで少し扱いやすい
*/


