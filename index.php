<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" v=<?php echo time();?>>
    <title>Document</title>
</head>
<body>
    <?php include ("inc/db.php");
          include ("inc/func.php");
          
          createTables($conn);
          $numbers= getNumbers($conn,"true");

        //   insert numbers into  database if its just been created
          if(!$numbers){
            $list= initialNumbers();
            insertNumbers($conn,$list);
          }
          
          
          
          $allNumbers= getNumbers($conn);
          
          $unusedList=[];
          $usedList=[];
          foreach($allNumbers as $num){
              if($num["available"]=="true" or $num["available"]){
              array_push($unusedList, (int)$num["num"]);
              }
              else{
                array_push($usedList, (int)$num["num"]);
              }
          }

         
          
          ?>
            <div class="controlls">
                <p>Unused</p>
               <button>RESET</button>
               
               
            </div>
          <div class="unused">
          <?php 
          if(!empty($unusedList)){ ?>
          <ul>
        <?php  foreach($unusedList as $num){
                echo "<li><a href=./update.php?value=$num&available=true>$num</a></li>";
          }
          ?>
          </ul>

       <?php }
        
          else{
              echo "<span>Unsused list is currently  empty </span>";
          
              }?>
          </div>
          <div class="used">
          <p>Used</p>
           
          <?php 
          if(!empty($usedList)){ ?>
          <ul>
        <?php  foreach($usedList as $num){
                echo "<li><a href=./update.php?value=$num&available=false>$num</a></li>";
          }
          ?>
          </ul>

       <?php }
        
          else{
              echo "<span>Used list is currently  empty </span>";
          
              }?>
          </div>
</body>
</html>