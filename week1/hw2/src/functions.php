<?php

function task1($strings, $union = false) {
	if ($union === false) {
		foreach ($strings as $string) {
			echo '<p>' . $string . '</p>';
		}
	} elseif ($union === true) {
		return implode(' ',$strings);
	}
}

function task2($operation) {
	$args = func_get_args();
	for ($i = 1; $i < sizeof($args); $i++) {
		if (!is_int($args[$i]) && !is_float($args[$i])) {
			trigger_error('Переменные не являются целыми или вещественными');
			return;
		}
	}
	$result = 0;
	if ($operation === '+') {
		for ($i = 1; $i < sizeof($args); $i++) {
			$result += $args[$i];
		}
	} elseif ($operation === '-') {
		for ($i = 1; $i < sizeof($args); $i++) {
			$result -= $args[$i];
		}
	} elseif ($operation === '*') {
		$result = 1;
		for ($i = 1; $i < sizeof($args); $i++) {
			$result *= $args[$i];
		}
	} elseif ($operation === '/') {
		if (in_array(0, $args, true)) {
			trigger_error('Деление на 0!');
			return;
		} else
			{
				$result = 1;
			for ($i = 1; $i < sizeof($args); $i++) {
				$result /= $args[$i];
			}
		}
	} else {
		trigger_error('Передан некорректный оператор');
		return;
	}
	echo 'Результат: ' . $args[1] . ' ';
	for ($i = 2; $i < sizeof($args); $i++) {
		echo $args[0] . ' ' . $args[$i] . ' ';
	}
	echo ' = ' . $result;
}

function task3($a, $b) {
	if (is_int($a) && is_int($b)) {
		echo '<table border = "1">';
		for ($i = 1; $i <= $a; $i++) {
	echo '<tr>';
	for ($j = 1; $j <= $b; $j++) {
		echo '<td>' . $i*$j . '</td>';
	}
	echo '</tr>';
}
echo '</table>';
	} else echo 'Переданы не целые числа';
}

function task4() {
	date_default_timezone_set('Asia/Yekaterinburg');
	echo date('d.m.Y H:i') . '<br>';
}

function task5() {
	echo strtotime('24.02.2016 00:00:00');
}

function task6() {
	$string = 'Карл у Клары украл Кораллы';
	$string_new = str_replace('К', '', $string);
	echo $string_new . '<br>';
}

function task7() {
	$string = 'Две бутылки лимонада';
	echo str_replace('Две', 'Три', $string) . '<br>';
}

function task8() {
	file_put_contents('test.txt', 'Hello again!');
}

function task9($file_name) {
	$fp = fopen($file_name, 'r');
	if ($fp) {
		while(!feof($fp)) {
			$content .= fgets($fp, 1024);
		}
		echo $content;
	} else {
		echo 'Файл недоступен';
		return;
	}
	fclose($fp);
}