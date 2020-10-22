
<?php

include ("inc/db.php");
include ("inc/func.php");


$state=$_GET["available"];
$number =(int)$_GET["value"];


toggleAvailability($conn,$number);


header("Location:./index.php?modal=false");