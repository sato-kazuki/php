<?php

class Singleton {

	protected function __construct(){
	}

    static public function getInstance() {
        static $obj = null;
        if(null === $obj) {



			$obj = new static;



		}
		return $obj;
    }
}
