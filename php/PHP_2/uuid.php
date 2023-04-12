<?php
//uuidgenはコマンドラインなので、動かないこともないこともないような気もしなくもないが大体動く　-rはデフォルトだから書かなくても大丈夫
$uuid = trim(`uuidgen -r`);
//$uuid = trim(system('uuidgen -r'));//上と同じ
//$uuid = trim(exec('uuidgen -r'));//上と同じ,これが一番いい?
var_dump($uuid);