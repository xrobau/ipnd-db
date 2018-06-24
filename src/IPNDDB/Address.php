<?php

namespace AussieVoIP\IPNDDB\IPND;

class Address extends Base {
	private $ipndobj = "\AussieVoIP\IPND\Records\Address";

	protected $AddressType = "HOUSE";
	protected $Street1Name;
	protected $Street1Type;
	protected $Street1Suffix;
	protected $Street2Name;
	protected $Street2Type;
	protected $Street2Suffix;
	protected $State;
	protected $Locality;
	protected $Postcode;
	protected $House1stNum;
	protected $House1stSuffix;
	protected $House2ndNum;
	protected $House2ndSuffix;
	protected $BuildingFloorType;
	protected $BuildingFloorNr;
	protected $BuildingFloorSuffix;
	protected $BuildingLocation;
	protected $BuildingProperty;
	protected $BuildingType;
	protected $Building1stNum;
	protected $Building1stSuffix;
	protected $Building2ndNum;
	protected $Building2ndSuffix;

	public function getIPND() {
		$classname = $this->ipndobj;

		$i = new $classname($this->AddressType);

		$i->setLocality($this->Postcode, $this->Locality);
		if ($i->house) {
                        $i->elements->HouseNumberSubunit->setHouseNum($this->House1stNum, $this->House2ndNum);
                } elseif ($this->bld) {
                        $i->elements->BuildingSubunit->setBuildingNum($this->Building1stNum, $this->Building2ndNum);
			if ($this->BuildingFloorNr) {
				$i->elements->BuildingFloor = new Address\BuildingFloor($this->BuildingFloorNr.$this->BuildingFloorSuffix, $this->BuildingFloorType);
			}
			if ($this->BuildingProperty) {
				$i->elements->BuildingProperty->BuildingProperty = $this->BuildingProperty;
			}

                }
  
		$i->elements->StreetAddress->setStreetName($this->Street1Name, $this->Street1Type, $this->Street1Suffix);
		return $i;
	}
}
