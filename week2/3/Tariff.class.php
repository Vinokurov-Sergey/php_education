<?php
abstract class Tariff implements iTariff
{
    protected $price_km;
    protected $price_minute;
    protected $distance;
    protected $time;
    protected $services = [];

    public function __construct($distance, $time)
    {
        $this->distance = $distance;
        $this->time = $time;
    }


    public function calcPrice(){
        $price = $this->distance * $this->price_km + $this->time * $this->price_minute;
        if ($this->services){
            foreach ($this->services as $service){
                $price = $service->apply($this, $price);
            }
        }
        return $price;
    }
    public function addService($service){
        $this->services[] = $service;
    }
    public function getTime()
    {
        return $this->time;
    }
}