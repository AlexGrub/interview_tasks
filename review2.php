<?php

class Airplane {

    protected string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getCruisingAltitude() {
        switch ($this->type) {
            case '777':
                return $this->getMaxAltitude() - $this->getPassengerCount();
            case 'Air Force One':
                return $this->getMaxAltitude();
            case 'Cessna':
                return $this->getMaxAltitude() - $this->getFuelExpenditure();
        }
    }
}

$airplane = new Airplane('Cessna');
$airplane->getCruisingAltitude();