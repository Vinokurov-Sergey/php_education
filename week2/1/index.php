<?php
require('src/functions.php');

$names = ['Мария', 'Павел', 'Александр', 'Елена', 'Иван'];
$users = users_generator(50, $names);
echo '<pre>';
print_r($users);
$json = json_encode($users);
file_put_contents('../users.json', $json);
$data = json_decode(file_get_contents('../users.json'),true);
$count = count_names($data, $names);
echo 'Количество пользователей по именам:<br>';
print_r($count);
//$average_age = get_average_age($data);
//echo 'Средний возраст = ' . $average_age;
$average_age = get_average_age($data);
echo '<br>Средний возраст = ' . $average_age;