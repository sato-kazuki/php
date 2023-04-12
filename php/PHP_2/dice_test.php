<?php

require_once('./dice.php');

$av = [];
$count = 100000;
for($i=0;$i<$count;++$i){
	$d=dice("3D6");
	@$av[$d] ++;
}
ksort($av);


foreach($av as $k => $v){
	$av[$k] = $v / 100000*100;
	printf("%d: %.4f%%<br>\n",$k,$av[$k]);
}
