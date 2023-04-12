<?php
function dice($base ,$count) {
	$ret = 0;
	for($i = 0;$i <$count;++$i){
		$ret +=mt_rand(1,$base); 
	}
	return $ret;
}


$hp = dice(8,1);
echo "Hp: {$hp}<br>\n";



$str = dice(6,3);
echo "ストレングス: {$str}<br>\n";
$int = dice(6,3);
echo "インテリジェンス: {$int}<br>\n";
$wiz = dice(6,3);
echo "ウィズダム: {$wiz}<br>\n";
$dex = dice(6,3);
echo "デクスタリティ: {$dex}<br>\n";
$con = dice(6,3);
echo "コンスティテューション: {$con}<br>\n";
$chr = dice(6,3);
echo "カリスマ: {$chr}<br>\n";
