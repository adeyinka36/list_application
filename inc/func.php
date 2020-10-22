<?php

// function to create table to store numbers 

function createTables($db){
    try{
    $sql = "CREATE TABLE IF NOT EXISTS allnumbers (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        num INT(30) NOT NULL,
        available TEXT(30) NOT NULL
        )";
        $db->exec($sql);
        
    }
    catch(Exception $e){
    echo "Table could not be created.Here is the error message :". $e->message();

    }
}


// function for genrating initial number list

function initialNumbers(){
    $numberList=[];

    for ($i=0;$i<=100;$i++){
        array_push($numberList,$i);
    }

    return $numberList;
}

// function for inserting number into database

function insertNumbers($db,$numberList){
    foreach($numberList as $num){
     
    try{
        $sql = "INSERT INTO allnumbers (num, available) VALUES (?,?)";
        $stmt= $db->prepare($sql);
        $stmt->execute([$num, "true"]);
        
       }
    
    
    catch(Exception $e){
        echo "error inserting values";
    }
}

}
 
// fuction for retrieving used or unused nubers

function getNumbers($db){
   try{
    $sql= "SELECT * FROM allnumbers" ;
    $stmt = $db->prepare($sql);
     $stmt->execute();
    return $stmt->fetchAll();
   }catch(Exception $e){
       echo "error retrieving numbers";
   }

}

// function for showing number as used or as unused

function toggleAvailability($db,$num){
    if($_GET["available"]=="true"){
    $sql= "UPDATE allnumbers
    SET available = false WHERE num = $num
    ";
    }
    else {
        
        $sql= "UPDATE allnumbers
    SET available = true WHERE num = $num
    ";

    }

    try{
        $stmt= $db->prepare($sql);
        $stmt->execute();
    }
    catch(Exception $e){
        echo "couldnt toggle availability";
    }
    


}


// function to reset numbersto unused

function resetAll($db){
    $sql= "UPDATE allnumbers
    SET available = true WHERE available=false";
    
    try{
        $stmt= $db->prepare($sql);
        $stmt->execute();
    }
    catch(Exception $e){
        echo "couldnnt reset values";
    }
    
}