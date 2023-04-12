<?php
//50%,30%,15%,4%,1%

//比較的荒っぽいやり方
$list = [];
for($i = 0; $i < 50; ++$i){
	$list[] = 1;
}
for($i = 0; $i < 30; ++$i){
	$list[] = 2;
}
for($i = 0; $i < 15; ++$i){
	$list[] = 3;
}
for($i = 0; $i < 4; ++$i){
	$list[] = 4;
}
	$list[] = 5;


//var_dump($list);


$key = array_rand($list);
$card_id = $list[$key];

var_dump($card_id);




