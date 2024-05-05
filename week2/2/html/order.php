<?php
include '../src/config.php';
include '../src/class.db.php';
include '../src/class.BurgerOrders.php';

ini_set('display_errors', 'on');
ini_set('error_reporting', E_NOTICE | E_ALL);

$burger = new BurgerOrders();


$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];

$address = '';
$addressForm = [
    'street' => 'ул.',
    'home' => 'д.',
    'part' => 'корп.',
    'appt' => 'кв.',
    'floor' => 'этаж'
];

foreach ($_POST as $key => $value) {
    if ($value && array_key_exists($key, $addressForm)) {
        $address .= $addressForm[$key] . ' ' . $value . ', ';
    }
}

$data = ['address' => $address];

$user = $burger->getUserByEmail($email);
$order_num = 1;
if ($user){
    $user_id = $user['id'];
    $burger->orderInc($user['id']);
    $order_num = $user['orders_count'] + 1;
} else {
    $user_id = $burger->createUser($email, $name, $phone);
}
$order_id = $burger->addOrder($user_id, $data);

echo "Спасибо, ваш заказ будет доставлен по адресу: $address<br>
Номер вашего заказа: #$order_id<br>
Это ваш $order_num-й заказ!";
