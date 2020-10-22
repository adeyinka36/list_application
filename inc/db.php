<?php

include "bootstrap.php";

$host=  getenv("HOST");
$user= getenv("USER");
$password= getenv("PASSWORD");
$dbName= getenv("DATABASENAME");

$dsn = "mysql:host=". $host .";dbname=". $dbName;

$conn = new PDO($dsn,$user,$password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);