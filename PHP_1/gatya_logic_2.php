<?php

//合計数を把握
$total = 50 + 30 + 15 + 4 + 1;
//乱数を生成
$key = mt_rand(0, $total - 1);
var_dump($key);
//どれにヒットするかを判定
if (0 <= $key && $key < 50) {
	$card_id = 1;
} else if(50 <= $key && $key < (50+30)){
	$card_id = 2;
} else if((50+30) <= $key && $key < (50+30+15)){
	$card_id = 3;
} else if((50+30+15) <= $key && $key < (50+30+15+4)){
	$card_id = 4;
} else if((50+30+15+4) <= $key && $key < (50+30+15+4+1)){
	$card_id = 5;
} else {
	$card_id = -1;
}

var_dump($card_id);

