<?php


$host= "localhost";
$user="root";
$password="";
$dbName="numbers";

$dsn = "mysql:host=". $host .";dbname=". $dbName;

$conn = new PDO($dsn,$user,$password);