<?php
require_once('./DB.php');
//
$dbh = DB::getHandle();
// ������type�̃J�[�h�ꗗ���擾
$sql = 'SELECT * FROM cards;';
$pre = $dbh->prepare($sql);
//$pre->bindValue('', $);
//
$r = $pre->execute();
$list = $pre->fetchAll(); // XXX �`�F�b�N������
foreach($list as $datum) {
    // URI����
    if ('' === ($uri = $datum['image_uri'])) {
var_dump($datum['card_id']);
        continue;
    }
    $uri_parts = parse_url($uri);
    // URI���p�[�X�ł��Ȃ�
    if (false === $uri_parts) {
var_dump($datum['card_id']);
        continue;
    }
    if (false == isset($uri_parts['host'])) {
        //var_dump($uri, $datum['card_id'], $uri_parts);
        continue;
    }
    // ���h���C��
    if ('dev2.m-fr.net' === $uri_parts['host']) {
        continue;
    }
    // else
    //
    $no = $datum['card_id'];
    // �g���q�̔c��
    $ext = (new SplFileInfo($uri_parts['path']))->getExtension();
//var_dump("/home/furu/wwwroot/gatya/images/{$no}.{$ext}");
//if ('' === $ext) {
    //var_dump($uri, $datum['card_id'], $uri_parts);
//}
    // �t�@�C���̎擾
    $cmd = "wget {$uri} -O /home/furu/wwwroot/gatya/images/{$no}.{$ext}";
//var_dump($cmd);
    //`$cmd`;
    // URI�̑g�ݗ��Ă�update
    //$uri = "http://dev2.m-fr.net/furu/gatya/images/{$no}.{$ext}";
    //update
}
