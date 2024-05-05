<?php

class TariffHour extends Tariff
{
    protected $price_km = 0;
    protected $price_minute = 200 / 60;

    public function __construct($distance, $time){
        parent::__construct($distance, $time);
        if ($this->time < 60) {
            $this->time = 60;
        } else {
            $this->time = $this->time - $this->time % 60 + 60;
        }
    }
}