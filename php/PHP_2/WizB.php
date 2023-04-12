<?php
function dice($base ,$count=1) {
	$ret = 0;
	for($i = 0;$i <$count;++$i){
		$ret +=mt_rand(1,$base); 
	}
	return $ret;
}

$bonus = dice(5)+4;

$base_point =0;
while (20 === dice(20)){
	$base_point ++;
}
$bonus += dice(5,$base_point);




echo "ボーナス: {$bonus}<br>\n";
