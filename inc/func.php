<?php

// function to create table to store numbers 

function createTables(){
    try{
    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        num INT(30) NOT NULL,
        availablity BOOLEAN NOT NULL
        )";
    }
    catch(Exception $e){
    echo "Table could not be created.Here is the error message :". $e->message();

    }
}