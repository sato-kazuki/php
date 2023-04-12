<?php

require_once('./init.php');

if(false === Authorization::isAuth()){
	header('Location:./index.html');
	return;
}