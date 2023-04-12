<?php

$uuid = trim(exec('uuidgen -r'));
var_dump($uuid);

$id = random_bytes(32);
var_dump(base64_encode($id));