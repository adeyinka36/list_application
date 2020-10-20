<?php

// function to create table to store numbers 

function createTables($db){
    try{
    $sql = "CREATE TABLE IF NOT EXISTS nums (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        num INT(30) NOT NULL,
        availablity BOOLEAN NOT NULL
        )";
        $db->exec($sql);
        
    }
    catch(Exception $e){
    echo "Table could not be created.Here is the error message :". $e->message();

    }
}



// function for inserting number into database

function insertNumbers($db){


}
 