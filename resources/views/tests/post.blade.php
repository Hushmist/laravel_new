<?php

$user_cars = $_GET['user_cars'];
foreach ($user_cars as $user_car) {
	echo $user_car . ' ';
}