<?php
interface iTariff {
    public function calcPrice();
    public function addService($service);
    public function getTime();
}
