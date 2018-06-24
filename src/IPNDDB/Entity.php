<?php

namespace AussieVoIP\IPNDDB\IPND;

class Entity extends Base {
	private $ipndobj = "\AussieVoIP\IPND\Records\Entity";
	protected $elmaps = [
		"type" => "Type",
		"title" => "Title",
		"rawname" => "Rawname",
		"surname" => "Surname",
		"firstname" => "Firstname",
		"longname" => "Longname",
		"contactnum" => "Contactnum",
	];

	protected $Type;
	protected $Title;
	protected $Rawname;
	protected $Surname;
	protected $Firstname;
	protected $Longname;
	protected $Contactnum;

	public function getIPND() {
		$classname = $this->ipndobj;
		$i = new $classname();

		foreach ($this->elmaps as $d => $s) {
			$i->$d = $this->$s;
		}
		return $i;
	}
}
