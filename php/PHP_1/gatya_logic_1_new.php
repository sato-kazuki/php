<?php
//50%,30%,15%,4%,1%

function gatya($param) {
	//配列を作る
	$list = [];
	foreach($param as $card_id => $num) {
		for($i = 0; $i < $num; ++$i) {
			$list[] = $card_id;
		}
	}
	//一つ取り出す
	return $card_id = $list[array_rand($list)];
}
/*
$param = [
	1 => 50,
	2 => 30,
	3 => 15,
	4 => 4,
	5 => 1,
];

$card_id = gatya($param);
var_dump($card_id);
*/

