<?php  // Gacya.php
require_once('./DB.php');
class Gacya {
    //
    static public function getCard($gacha_type) {
// XXX ��������L���b�V���Ώ�
// $param, $total���L���b�V������
        //
        $dbh = DB::getHandle();
        // ������type�̃J�[�h�ꗗ���擾
        $sql = 'SELECT * FROM gachas WHERE gacha_type = :gacha_type ;';
        $pre = $dbh->prepare($sql);
        //
        $pre->bindValue(':gacha_type', $gacha_type);
        //
        $r = $pre->execute();
        $list = $pre->fetchAll(); // XXX �`�F�b�N������
        // param�����
        $param = [];
        foreach($list as $datum) {
            $param[ $datum['card_id'] ] = $datum['probability'];
        }
        // �u���v���v��c��
        $total = 0;
        foreach($param as $card_id => $num) {
            $total += $num;
        }
// XXX �����܂ŃL���b�V���Ώ�
        // �����𐶐�
        $key = mt_rand(0, $total - 1);
//var_dump($key);
        // �u�ǂ�Ƀq�b�g���邩�v�𔻒�
        $before = 0;
        foreach($param as $card_id => $num) {
            $before += $num;
            if ($key < $before) {
                return $card_id;
            }
        }
        // else
        return -1;
    }
}






//var_dump($list);
//var_dump( array_rand($list) );
//var_dump( $list[array_rand($list)] );
//var_dump( $list[array_rand($list)]['card_id']);
//exit;
//�J�[�h�ꗗ����u1���v��I�яo��
//return $list[array_rand($list)]['card_id'];
