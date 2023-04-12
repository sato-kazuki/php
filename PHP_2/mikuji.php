<?php
/*
「おみくじの束」を用意する
「おみくじの束」から１つ引く
引いた番号の紙を取り出す
表示する
*/

$mikuji_box = ['大吉','中吉','小吉','末吉','吉','凶','大凶'];

/*echo $mikuji_box[mt_rand(0,count($mikuji_box)-1)];*/

/*jsonで返却する*/
$ret['contents'] = $mikuji_box;
header('Content-type: application/json');
echo json_encode($ret);