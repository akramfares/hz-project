<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'kraymond,,,');
define('DB_DATABASE', 'hawlizwin');
$dbh = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
?>