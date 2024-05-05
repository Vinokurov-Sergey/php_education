<?php
include 'iTariff.php';
include 'iService.php';
include 'Tariff.class.php';
include 'TariffBasic.Class.php';
include 'TariffHour.Class.php';
include 'TariffStudent.Class.php';
include 'GPSservice.php';
include 'DriverService.php';

$distance = mt_rand(1,100);
$time = mt_rand(1,300);
$services = mt_rand(0,3);
$messages = '';

$tariff = check_tariff($distance, $time, $messages);
$messages .= " расстояние: $distance км., время: $time мин. ";
$tariff = trip($tariff, $services, $messages);

echo "$messages, стоимость = " . $tariff->calcPrice() . '<br>';

function check_tariff($distance, $time, &$messages) {
    $checked = mt_rand(1,3);
    switch ($checked) {
        case 1:
            $tariff = new TariffBasic($distance,$time);
            $messages = 'Тариф Базовый';
            break;
        case 2:
            $tariff = new TariffHour($distance,$time);
            $messages = 'Тариф Почасовой';
            break;
        case 3:
            $tariff = new TariffStudent($distance,$time);
            $messages = 'Тариф Студенческий';
            break;
        default:
            $tariff = null;
            break;
    }
    return $tariff;
}
function trip($tariff, $services, &$messages)
{
    switch ($services) {
        case 1:
            $tariff->addService(new GPSservice());
            $messages .= ' + Сервис GPS';
            break;
        case 2:
            $tariff->addService(new DriverService());
            $messages .= ' + Сервис Дополнительный водитель';
            break;
        case 3:
            $tariff->addService(new GPSservice());
            $tariff->addService(new DriverService());
            $messages .= 'Сервис GPS + Сервис Дополнительный водитель';
            break;
        default:
            break;
    }
    return $tariff;
}
