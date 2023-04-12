<?php
/*
1:HP+10
2:MP+10
3:HP+500
4:HP+100, MP+100
*/
function use_item($item_id, $obj){
	
	echo "{$item_id}番のアイテムを使用<br>\n";

	switch($item_id){
		case 1:
			$obj->healHP(10);
			break;
		case 2:
			$obj->healMP(10);
			break;
		case 3:
			$obj->healHP(500);
			break;
		case 4:
			$obj->healHP(100);
			$obj->healMP(100);
			break;
		default:
			break;


	}
}


class PC{
	public function __construct($hp, $mp){
		$this->max_hp = $this->hp = $hp;
		$this->max_mp = $this->mp = $mp;
	}
	public function print(){
		echo "HP: {$this->hp}/{$this->max_hp}<br>\n";
		echo "MP: {$this->mp}/{$this->max_mp}<br>\n";
		echo "<br>\n";
	}

	public function healHP($h){
		if(0 < $h){
			$this->hp +=$h;
		}
		if($this->hp > $this->max_hp){
			$this->hp = $this->max_hp;
		}
	}
	public function healMP($h){
		if(0 < $h){
			$this->mp +=$h;
		}
		if($this->mp > $this->max_mp){
			$this->mp = $this->max_mp;
		}
	}
	public function damageHp($d){
		if(0 < $d){
			$this->hp -=$d;
		}
	}
	public function damageMp($d){
		if(0 < $d){
			$this->mp -=$d;
		}
	}


	private $max_hp;
	private $hp;
	private $max_mp;
	private $mp;

}

$obj = new PC(500, 300);
$obj->print();
$obj->damageHp( mt_rand(1,300) );
$obj->damageMp( mt_rand(1,300) );
$obj->print();

use_item( mt_rand(1,4), $obj);
$obj->print();
