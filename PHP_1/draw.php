<?php

session_start();

require_once('./init_auth.php');
require_once('./Card.php');
require_once('./Gacya.php');
require_once('./DB.php');

$while_list = [
	'1' => 'nomal_1',
	'2' => 'nomal_2',
	'3' => 'nomal_3',
	'4' => 'nomal_4',
	'5' => 'nomal_5',
	'6' => 'nomal_6',
	'7' => 'nomal_7',
	'8' => 'nomal_8',
	'9' => 'nomal_9',
	'10' => 'nomal_10',
	'11' => 'nomal_11',
];
$id = (string)@$_GET['id'];
if(false===isset($while_list[$id])){
	echo '���݂��Ȃ�������^�C�v�ł�';
}
$card_id = Gacha::getCard($while_list[$id]);
$card = new Card($card_id);
//var_dump($card);
//�������J�[�h���e�[�u���ɕۑ�����
$user_id = Authorization::getUserId();

//DB�n���h�����擾����
$dbh = DB::getHandle();

$sql = 'INSERT INTO user_cards(user_id, card_id)
			VALUES (:user_id, :card_id)';
$pre = $dbh->prepare($sql);

$pre->bindValue(':user_id',$user_id);
$pre->bindValue(':card_id',$card_id);

//SQL�̎��s
$r = $pre->execute();
if(false === $r){
	echo 'INSERT�Ŏ��s���܂���';
	exit;
}

echo '�J�[�h���F',$card->card_name, '<br>';
echo "<img src='[$card->image_url]>', width = 200"<br>;
echo'<br>',$card->card_id, '<br>';
echo $card->attack,'/', $card->defense;
