<?php

require_once('./init_auth.php');

require_once('./Card.php');
require_once('./DB.php');
//自分のカードの一覧をSQLで取得
$sql = 'SELECT * FROM user_cards LEFT JOIN cards ON cards.card_id = user_cards.card_id WHERE user_id = :user_id ORDER BY user_cards.card_id DESC ;';
$pre = $dbh->prepare($sql);
$user_id = Authorization::getUserId();
$pre->bindValue(':user_id', $user_id);
$r = $pre->execute();

$list = $pre->fetchAll(PDO::FETCH_ASSOC);
//var_dump($list);
//出力
foreach($list as $datam) {
	echo 'カード名：', $datam['card_name'], "<br>\n";
	echo "<ima src='{$datam['image_url']}' width=100><br>\n";
	echo "<br><br>\n"
}


