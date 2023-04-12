<?php

function gatya($param) {
	$total = 0;
	foreach($param as $card_id => $num) {
		$total += $num;
	}
	$key = mt_rand(0, $total - 1);
	$before = 0;
	foreach($param as $card_id => $num) {
		$before += $num;
		if($key < $before) {
			return $card_id;
		}
	}

	return -1;

}

$param = [
	1 => 50,
	2 => 30,
	3 => 15,
	4 => 4,
	5 => 1,
];


$card_id = gatya($param);
//var_dump($card_id);