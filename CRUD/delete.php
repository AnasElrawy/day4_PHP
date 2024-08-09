<?php

session_start();


if(empty($_SESSION['username'])){
    echo "you should login";
    echo "<a href='index.php'> home</a>";

 }

 else{
try
{

    require_once("../db/conne.php");



$sql= "DELETE FROM user WHERE id = ?";
$stmt=$db->prepare($sql);
$stmt->execute([$_GET["id"]]);
$result=$stmt->fetchAll();

echo "it is deleted";
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
 }
?>