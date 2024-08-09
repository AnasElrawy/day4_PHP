<?php

session_start();

if(empty($_SESSION['username'])){
   echo "you should login";
   echo "<a href='index.php'> home</a>";

}

else{
try {

   require_once("db/conne.php");

   if($flag){

      $sql = 'INSERT INTO user (firstname,secondname,address,gender,country,username,password,image,dep)
      VALUES (?,?,?,?,?,?,?,?,?)';
   
      $stmt=$db->prepare($sql);
      $stmt->execute([$_POST['firstName'],$_POST['lastName'],$_POST['adress'],$_POST['gender'],$_POST['country'],$_POST['userName'],$_POST['password'],$target_file,$_POST['department']]);
   }
   else {

      // echo "i in the not image <br>";
      $sql = 'INSERT INTO user (firstname,secondname,address,gender,country,username,password,dep)
      VALUES (?,?,?,?,?,?,?,?)';
   
      $stmt=$db->prepare($sql);
      $stmt->execute([$_POST['firstName'],$_POST['lastName'],$_POST['adress'],$_POST['gender'],$_POST['country'],$_POST['userName'],$_POST['password'],$_POST['department']]);
   
   }
   $result=$stmt->rowCount();
   $id=$db->lastInsertId();
 
    
   if (isset($_POST['skills'])) {

        
      foreach ($_POST['skills'] as $skill){
      echo "add<br>";
      $sql2 = 'INSERT INTO skill (userid,skill) VALUES (?,?)';
      $stmt2=$db->prepare($sql2);
      $stmt2->execute([$id,$skill]);
            
      }
   } 
}
   catch (PDOException $e) {
       echo 'Connection failed: ' . $e->getMessage();
   }

}
?>   