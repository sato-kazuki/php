<?php  // UserCards.php
class UserCards {
    //
    public static function save($user_id, $card_id) {
        // DB�n���h�����擾����
        $dbh = DB::getHandle();
        //
        $sql = 'INSERT INTO user_cards(user_id, card_id) VALUES (:user_id, :card_id);';
        $pre = $dbh->prepare($sql);
        // �v���[�X�z���_�ւ̒l��bind
        $pre->bindValue(':user_id', $user_id);
        $pre->bindValue(':card_id', $card_id);
        // SQL�̎��s
        $r = $pre->execute();
        return $r;
    }
}