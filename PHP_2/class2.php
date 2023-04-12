<?php
class EquipmentItem {
	public function __construct($offense, $defense){
		$this->offense = $offense;
		$this->defense = $defense;
	}

	public $offense;//攻撃力
	public $defense;//防御力

	
}








class PC{
//constructor
	public function __construct($str, $vit, $hp){
		$this->str = $str;
		$this->vit = $vit;
		$this->hp = $hp;
		$this->equipment = [];
	}


//method
	public function equipWeapon($obj){
		$this->equipment['Weapon'] = $obj;
	}
	public function equipArmor($obj){
		$this->equipment['Armor'] = $obj;
	}

	public function getStr(){
		$offense = $this->str;
		foreach($this->equipment as $obj){
			$offense += $obj->offense;
		}
		return $offense;
	}
	public function getVit(){
		$defense = $this->vit;
		foreach($this->equipment as $obj){
			$defense += $obj->defense;
		}
		return $defense;
	}
	public function getHp(){
		return $this->hp;
	}
	

//propatty
	private $str;
	private $vit;
	private $hp;
	private $equipment;
}


$obj = new PC(mt_rand(1, 12), mt_rand(1, 12), mt_rand(1, 12));
echo '攻撃力: ',$obj->getStr(),"<br>\n";
echo '防御力: ',$obj->getVit(),"<br>\n";
echo 'Hp: ',$obj->getHp(),"<br>\n";

//$e_weapon = new EquipmentItem(100,0);
//$obj->equipWeapon($e_weapon);
$obj->equipWeapon(new EquipmentItem(100,0));
//$e_armor = new EquipmentItem(0,50);
$obj->equipArmor(new EquipmentItem(0,50));

echo "<br>\n装備後のステータス<br>\n";
echo '攻撃力: ',$obj->getStr(),"<br>\n";
echo '防御力: ',$obj->getVit(),"<br>\n";
echo 'Hp: ',$obj->getHp(),"<br>\n";