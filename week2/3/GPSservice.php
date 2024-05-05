<?php
class GPSservice implements iService {
    private $priceHour = 15;

    public function __construct(){
        return $this;
    }
    public function apply($tariff, $price){
        $time = ceil($tariff->getTime() / 60);
        $price += $this->priceHour * $time;
        return $price;
    }
}