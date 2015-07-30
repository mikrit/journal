<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'title' => array(
		'not_empty'     => 'Заполните поле \'Вид анализа\'',
	),
	'number_a' => array(
		'not_empty'     => 'Заполните поле \'Номер анализа\'',
	),
	'password' => array(
		'not_empty'			=> 'Заполните поле \'Пароль\'',
		'min_length'		=> 'Пароль должен состоять минимум из 6 символов',
	),
	'username' => array(
		'not_empty'		=> 'Заполните поле \'Логин\'',
	),
	'fio' => array(
		'not_empty'		=> 'Заполните поле \'ФИО\'',
	),
	'password_confirm' => array(
		'matches'		=> 'Пароли не совпадают',
	),
	'material_number' => array(
		'max_length'		=> 'Длина номера должна быть не более 30 символов',
	),
);