<?php

function startup()
{
	getDbConnect();

	// Языковая настройка
	setlocale(LC_ALL, 'ru_RU.UTF-8');

	mb_internal_encoding('UTF-8');

	// Открытие сессии
	session_start();
}

function getDbConnect()
{
	static $link;

	// настройки подключения к бд
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'ht_2_Mironov';

	// только одно соединение с бд
	if ($link === null) {
		// подключаемся к БД
		$link = mysqli_connect($hostname, $username, $password) or die("No connect with database");
		mysqli_query($link, 'SET NAMES utf8');
		mysqli_set_charset($link, 'utf8');
		mysqli_select_db($link, $dbName) or die("No databse");
	}

	return $link;
}

// экранирование переменных
function sql_escape($param)
{
	return mysqli_escape_string(getDbConnect(), $param);
}



