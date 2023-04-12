<?php  // charge.php
// �F�ؕt����������
require_once('./init_auth.php');
//
require_once('./DB.php');
require_once('./Gacya.php');
require_once('./Card.php');
require_once('./UserCards.php');
// ������̃^�C�v�̔c��
// XXX ����͌Œ�B�{���͊O������
// XXX �Ȃ̂ŁA����z���C�g���X�g�ŃZ�L�����e�B��S��
$type = 'charge_1';
// ��������������߂̃R�X�g
// XXX �{����DB(������e�[�u��)����
$cost = 100;
// ��ɂ�����������Ă���
$card_id = Gacya::getCard( $type );
$card = new Card($card_id);
// DB�n���h�����擾����
$dbh = DB::getHandle();
// ��������g�����U�N�V�����J�n
$dbh->beginTransaction();
// �����J�n
$user_id = Authorization::getUserId();
try {
    // �莝���̉ۋ��΂̃`�F�b�N
    // XXX FOR UPDATE ��Y�ꂸ�ɁI�I
    $sql = 'SELECT * FROM users WHERE user_id = :user_id FOR UPDATE;';
    $pre = $dbh->prepare($sql);
    //
    $pre->bindValue(':user_id', $user_id);
    $r = $pre->execute();
    if (false === $r) {
        throw new Exception($pre->errorInfo()[2]);
    }
    $user = $pre->fetch();
//var_dump($user['charge']);
    if ($user['charge'] < $cost) {
        throw new Exception('����������Ȃ�: ' . $user['charge']);
    }
    // ���x���������Ă������
    $sql = 'UPDATE users SET charge = :new_charge WHERE user_id = :user_id;';
    $pre = $dbh->prepare($sql);
    //
    $pre->bindValue(':user_id', $user_id);
    $pre->bindValue(':new_charge', $user['charge'] - $cost);
    $r = $pre->execute();
    if (false === $r) {
        throw new Exception($pre->errorInfo()[2]);
    }
    // �J�[�h���P��������
    // XXX ��ň����Ă�( $card_id )
    // user_cards�ɒǉ�����
    $r = UserCards::save($user_id, $card_id);
    if (false === $r) {
        throw new Exception('�J�[�h��insert�Ŏ��s');
    }
    // �����Ńg�����U�N�V�����I��
    $dbh->commit();
} catch (Exception $e) {
    $dbh->rollBack();
    echo '���݂܂��񂤂܂��ۑ��ł��Ȃ������̂ł������A���������Ă�';
var_dump($e->getMessage()); // �{����log�Ƃ��ɏ���
    return ;
}
// �������J�[�h��\��
echo '�J�[�h��: ', $card->card_name, '<br>';
echo "<img src='{$card->image_uri}' width=200>";
echo '<br>', $card->card_text, '<br>';
echo $card->attack , '/' , $card->defense;