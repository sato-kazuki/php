<?php

require_once('./init.php');

require_once('./Authentication.php');

if(false === Authentication ::isLogin($_POST['id'], $_POST['pw'])) {
    echo 'ログインできませんでした';
    exit;
}

//認可開始
Authorization::authOn( Authentication::getUser());

//ログイン後TopPageに遷移
header('Location: ./top.php');
