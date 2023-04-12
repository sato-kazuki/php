<?php
$gatya[];
for ($i = 0; $i < 40; $i ++){
	$gatya[] = 'サーヴァント 星3';
	$gatya[] = '概念礼装 星3';
}
for ($i = 0; $i < 12; $i ++){
	$gatya[] = '概念礼装 星4';
}
for ($i = 0; $i < 4; $i ++){
	$gatya[] = '概念礼装 星5';
}
for ($i = 0; $i < 3; $i ++){
	$gatya[] = 'サーヴァント 星4';
}
$gatya[] = 'サーヴァント 星5';
for($i = 0; $i <10; $i ++){
$card = $gatya[ mt_rand(0,99)];
echo "{$card}<br>\n";
}
