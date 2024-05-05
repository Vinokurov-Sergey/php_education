<?php
class DriverService implements iService {
    private $priceDriver = 100;

    public function __construct(){
        return $this;
    }
    public function apply($tariff, $price){
        $price += $this->priceDriver;
        return $price;
    }
}