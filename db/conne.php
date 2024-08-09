<?php
require_once("config.php");

$dsn = 'mysql:dbname='.DB_DATABASE.';host='.DB_HOST;
$db = new PDO($dsn, DB_USER, DB_PASSWORD);

?>