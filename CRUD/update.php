<?php

// echo "this is update";

// echo $_GET["id"];
session_start();


if(empty($_SESSION['username'])){ 
    echo "you should login";
    echo "<a href='index.php'> home</a>";

 }

 else{

try
{

    require_once("db/conne.php");





if ($flag) {

    $sql= "UPDATE user 
    SET firstname=?,secondname=?,address=?,gender=?,country=?,username=?,password=?,image=?,dep=?
    WHERE id = ? ";
    
    $stmt=$db->prepare($sql);
    $stmt->execute([$_POST['firstName'],$_POST['lastName'],$_POST['adress'],$_POST['gender'],$_POST['country'],$_POST['userName'],$_POST['password'],$target_file,$_POST['department'],$_GET['id']]);
}
else
{


    $sql= "UPDATE user
    SET firstname=?,secondname=?,address=?,gender=?,country=?,username=?,password=?,dep=?
    WHERE id = ?;";
    $stmt=$db->prepare($sql);


    $stmt->execute([$_POST['firstName'],$_POST['lastName'],$_POST['adress'],$_POST['gender'],$_POST['country'],$_POST['userName'],$_POST['password'],$_POST['department'],$_GET["id"]]);

}
$result=$stmt->fetchAll();



$sql2 = 'DELETE FROM skill WHERE userid=?' ;
      $stmt2=$db->prepare($sql2);
      $stmt2->execute([$_GET["id"]]);
    
   if (isset($_POST['skills'])) {



        
      foreach ($_POST['skills'] as $skill){
      echo "add<br>";
      $sql2 = 'INSERT INTO skill (userid,skill) VALUES (?,?)';
      $stmt2=$db->prepare($sql2);
      $stmt2->execute([$_GET["id"],$skill]);
            
      }
   } 

echo "it is updated";
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}

 }
?>
