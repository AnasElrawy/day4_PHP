<?php

// session_start();


if(empty($_SESSION['username'])){
    echo "you should login";
    echo "<a href='index.php'> home</a>";

 }

 else{
try
{
    require_once("db/conne.php");



$query= "SELECT * FROM user";
$stmt=$db->prepare($query);
$stmt->execute();
$result=$stmt->fetchAll();

}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
 }
?>