<?php  // daily.php
// �F�ؕt����������
require_once('./init_auth.php');
//
require_once('./DB.php');
require_once('./Gacya.php');
require_once('./Card.php');
require_once('./UserCards.php');
// ������type�͌Œ�
/*
CREATE TABLE daily_gatya_type (
    gacha_type VARBINARY(128) NOT NULL,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL
);
 */
$type = 'nomal_6'; // XXX �{����DB�Ƃ��ɏo�����ق�������
// �udaily����������łɈ����Ă邩�v�m�F
//$loot_date = date('Y-m-d'); // ���t��c��
$loot_date = date('Y-m-d', time() - (5 * 60 * 60)); // ���t��c��: ���Z�b�g�� 5:00�̏ꍇ
$user_id = Authorization::getUserId();
// DB�n���h�����擾����
$dbh = DB::getHandle();
// SELECT���Ă݂āA���݂��Ă邩�ǂ����m�F�F�g�����͐؂�Ȃ��Ă悢
$sql = 'SELECT count(*) as cnt FROM daily
         WHERE user_id=:user_id AND loot_date=:loot_date;';
$pre = $dbh->prepare($sql);
// �G���[�m�F
//var_dump($pre);
//var_dump($dbh->errorInfo());
//exit;
//
$pre->bindValue(':user_id', $user_id);
$pre->bindValue(':loot_date', $loot_date);
//
$r = $pre->execute();
$count = $pre->fetch();
//var_dump($count); exit;
if (0 < $count['cnt']) {
    echo '���łɃf�C���[������A�����Ă܂���';
    return ;
}
// ��������g�����U�N�V�����J�n
$dbh->beginTransaction();
// INSERT���Ă݂āA�ł��邩�ǂ����m�F
$sql = 'INSERT INTO daily(user_id, loot_date) VALUES(:user_id, :loot_date);';
$pre = $dbh->prepare($sql);
//
$pre->bindValue(':user_id', $user_id);
$pre->bindValue(':loot_date', $loot_date);
//
$r = $pre->execute();
if (false === $r) {
    $dbh->rollBack(); // �g�����U�N�V�����������߂�
    echo '���łɃf�C���[������A�����Ă܂���';
    return ;
}
echo '�f�C���[������������܂����I�I<br><br>';
// �����������
$card_id = Gacya::getCard( $type );
$card = new Card($card_id);
// �������J�[�h���e�[�u���ɕۑ�����
$r = UserCards::save($user_id, $card_id);
// �����Ńg�����U�N�V�����I��
if (true === $r) {
    $dbh->commit();
} else {
    $dbh->rollBack();
    echo '���݂܂��񂤂܂��ۑ��ł��Ȃ������̂ł������A���������Ă�';
    return ;
}
// �\��
echo '�J�[�h��: ', $card->card_name, '<br>';
echo "<img src='{$card->image_uri}' width=200>";
echo '<br>', $card->card_text, '<br>';
echo $card->attack , '/' , $card->defense;
