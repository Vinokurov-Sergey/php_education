<?php
echo '<b>Задание №1 </b><br><br>';

$name = 'Сергей';
$age = '34';
echo 'Меня зовут ' . $name . '<br>';
echo 'Мне ' . $age . ' года <br>';
echo '"!|/\'"\\<br>';

echo '<br><b>Задание №2 </b><br><br>';

const IMG_COUNT = 80;
const IMG_CRAYON = 23;
const IMG_PENCIL = 40;

echo 'На школьной выставке ' .IMG_COUNT. ' рисунков.<br>';
echo IMG_CRAYON . ' из них выполнены фломастерами,<br>';
echo IMG_PENCIL . ' карандашами, ';
echo 'а остальные — красками. <br>Сколько рисунков, выполненные красками, на школьной выставке?<br><br>';

$img_paint = IMG_COUNT - IMG_CRAYON - IMG_PENCIL;

echo 'Решение: <br>';
echo IMG_COUNT . ' - ' . IMG_CRAYON . ' - ' . IMG_PENCIL . ' = ' . $img_paint . ' рисунков.<br><br>';

echo 'Ответ: <br>На школьной выставке ' . $img_paint . ' рисунков, выполненных красками.<br>';

echo '<br><b>Задание №3 </b><br><br>';

$age = 17;
if (($age >= 18) && ($age <= 65)) {
	echo 'Вам еще работать и работать';
} elseif ($age > 65) {
	echo 'Вам пора на пенсию';
} elseif (($age >= 1) && ($age >= 17)) {
	echo 'Вам еще рано работать';
} else {
	echo 'Неизвестный возраст';
}

echo '<br><br><b>Задание №4 </b><br><br>';

$day = mt_rand(0,10);
echo 'День: ' . $day . ' - ';

switch ($day) {
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
		echo 'Это рабочий день';
		break;
	case 6:
	case 7:
		echo 'Это выходной день';
		break;
	default:
		echo 'Неизвестный день';
}

echo '<br><br><b>Задание №5 </b><br><br>';

$bmw = [
	'model' => 'X5',
	'speed' => 120,
	'doors' => 5,
	'year' => '2015'
];

$toyota = [
	'model' => 'Yaris',
	'speed' => 130,
	'doors' => 5,
	'year' => '2024'
];

$opel = [
	'model' => 'Mokka',
	'speed' => 140,
	'doors' => 5,
	'year' => '2020'
];

$cars = [
	'bmw' => $bmw,
	'toyota' => $toyota,
	'opel' => $opel
];

foreach ($cars as $car_name => $car) {
	echo 'CAR ' . $car_name . '<br>';
	echo $car['model'] . ' ' . $car['speed'] . ' ' . $car['doors'] . ' ' . $car['year'] . '<br><br>';
}

echo '<b>Задание №6 </b><br><br>';

echo '<table border = "1">';
for ($i = 1; $i <= 10; $i++) {
	echo '<tr>';
	for ($j = 1; $j <= 10; $j++) {
		if ($i % 2 === 0 && $j % 2 === 0) {
			echo '<td>(' . $i*$j . ')</td>';
		} elseif ($i % 2 !== 0 && $j % 2 !== 0) {
			echo '<td>[' . $i*$j . ']</td>';
		} else {
			echo '<td>' . $i*$j . '</td>';
		}
	}
	echo '</tr>';
}
echo '</table>';