<?php  // Box.php
//
require_once('./DB.php');
class Box {
    public function __construct($user_id, $box_type) {
        /* DB�ɃA�N�Z�X���ď����擾 */
        // DB�n���h���̎擾
        $dbh = DB::getHandle();
//var_dump($dbh);
        // �e�[�u������u�Y���̃��[�UBOX���v���擾
        $sql = 'SELECT * FROM user_box
                 WHERE user_id = :user_id 
                       AND
                       box_type = :box_type;';
        $pre = $dbh->prepare($sql);
        //
        $pre->bindValue(':user_id', $user_id);
        $pre->bindValue(':box_type', $box_type);
        //
        $r = $pre->execute(); // XXX �`�F�b�N������
        $data = $pre->fetch(); // XXX �`�F�b�N������
//var_dump($r, $data);
        // �u(���[�U)�f�[�^�����݂��Ȃ��v�Ȃ�A����Ă���
        if (false === $data) {
            //
            $sql = 'INSERT INTO user_box(user_id, box_type, data)
                         VALUES (:user_id, :box_type, :data);';
            $pre = $dbh->prepare($sql);
            //
            $pre->bindValue(':user_id', $user_id);
            $pre->bindValue(':box_type', $box_type);
            $pre->bindValue(':data', serialize([]));
            //
            $r = $pre->execute(); // XXX �`�F�b�N������
            $data = ['user_id' => $user_id, 'box_type' =>$box_type
                   , 'data' => serialize([]) ];
        }
        //
        $this->data = $data;
    }

	//�f�X�g���N�^
	//�f�[�^�̕ۑ�������
	public function update()
	{
		//DB�n���h���̎擾
		$dbh = DB::getHandle();
		//SQL�̍쐬
        $sql = 'UPDATE user_box SET data = :data WHERE user_id = :user_id AND box_type =:box_type;';
		$pre = $dbh->prepare($sql);
		//�o�C���h
		$pre->bindValue(':user_id',$this->data['user_id']);
		$pre->bindValue(':box_type',$this->data['box_type']);
		$pre->bindValue(':data',$this->data['data']);
		//���s
		$r = $pre->execute();
		if(false === $r) {
			throw new Exception('SQLerror'); //xxx
		}
	}
    // ���Z�b�g
    public function reset($update_flg = true) {
        // DB�n���h���̎擾
        $dbh = DB::getHandle();
        // �ubox_type�Ŏw�肳�ꂽ�J�[�h���ꎮ�v���擾
        $sql = 'SELECT * FROM box WHERE box_type = :box_type';
        $pre = $dbh->prepare($sql);
        //
        $pre->bindValue(':box_type', $this->data['box_type']);
        //
        $r = $pre->execute(); // XXX �`�F�b�N������
        $box_list = [];
        while($row = $pre->fetch()) {
//var_dump($row);
            $box_list[] = $row['card_id'];
        }
//var_dump($box_list);
        // �z��̃V���b�t��
        shuffle($box_list);
//var_dump($box_list);
		//data������
		$this->data['data'] = serialize($box_list);
        if (true === $update_flg) {
            // update
            // XXXXXXX
        }
        //
        return $box_list;
    }
    // �P������
    public function drow() {
        // data�̒��g��unserialize
        $box_list = unserialize( $this->data['data'] );
//var_dump($box_list);
        // data�̒��g���u��v�Ȃ�Areset()��call����
        if ([] === $box_list) {
            $box_list = $this->reset(false); // Update�͂��Ȃ�
//var_dump($box_list);
        }
        // 1������
		$card_id = array_pop($box_list);
//var_dump($card_id, $box_list);
        // �u��������̔z��v��serialize
		$this->data['data'] = serialize($box_list);
        // update
		$this->update();
    }
//
private $data;
}