<?php
require('src/functions.php');

echo '<br><b>Задание №1 </b><br><br>';

$task1Arr = [
	'Функция должна принимать массив строк,',
	'выводить каждую строку в отдельном параграфе.',
	'Если в функцию передан второй параметр true,',
	'возвращать (через return) результат в виде одной объединенной строки.'
];
task1($task1Arr);
$union_string = task1($task1Arr, true);
print_r($union_string);

echo '<br><br><b>Задание №2 </b><br><br>';

task2('+',3,2,4,2.2);

echo '<br><br><b>Задание №3 </b><br><br>';

task3(3,6);

echo '<br><br><b>Задание №4 </b><br><br>';

task4();
task5();

echo '<br><br><b>Задание №5 </b><br><br>';

task6();
task7();

echo '<br><br><b>Задание №6 </b><br><br>';

task8();
task9('test.txt');