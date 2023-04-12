<?php

session_start();
require_once('./Authorizarion.php');

Authorization::logout();
header('./Authorizarion.php');