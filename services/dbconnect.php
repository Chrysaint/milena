<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = "Milena";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

mysqli_set_charset($link, 'utf8');
