<?php
function users_generator(int $count, array $names) {
	$users = [];
	for ($i = 0; $i <= $count-1; $i++) {
		$user = [
			'id' => $i,
			'name' => $names[mt_rand(0,4)],
			'age' => mt_rand(18,45)
		];
		$users[] = $user;
	}
	return $users;
}

function count_names(array $users, array $names) {
	$count = [];
	foreach($users as $user) {
		if (in_array($user['name'], $names)) {
			$count[$user['name']] += 1;
		}
	}
	return $count;
}

function get_average_age(array $users) {
	$sum = 0;
	foreach ($users as $user){
		$sum += $user['age'];
	}
	return $sum / sizeof($users);
}