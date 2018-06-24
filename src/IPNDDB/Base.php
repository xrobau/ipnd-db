<?php

namespace AussieVoIP\IPNDDB\IPND;

class Base {
	private $em;

	protected $id;

	public function __construct($em) {
		$this->em = $em;
	}

	public function getId() {
		return $this->id;
	}

	public function storeIPND($o) {
		if (!isset($o->elements)) {
			if (!isset($this->elmaps)) {
				throw new \Exception("No elements, no maps, Can't do it");
			}
			foreach ($this->elmaps as $s => $d) {
				$this->$d = $o->$s;
			}
		} else {
			$e = $o->elements;
			foreach ($e as $k => $v) {
				if (isset($v->multiple)) {
					foreach ($v->getMultiple() as $n => $v) {
						$this->saveElement($n, $v);
					}
				} else {
					$this->saveElement($k, $v->get());
				}
			}
		}
	}

	private function saveElement($n, $row) {
		if (!property_exists($this, $n)) {
			throw new \Exception("Couldn't find $n. Impossible.");
		}
		if ($row['value']) {
			$this->$n = $row['value'];
		}
	}	
}
