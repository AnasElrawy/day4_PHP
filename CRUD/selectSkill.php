<?php


// session_start();


if(empty($_SESSION['username'])){
    echo "you should login";
    echo "<a href='index.php'> home</a>";

 }

 else{
try {

    require_once("db/conne.php");


    $query2= "SELECT skill FROM skill where userid = ?";
    $stmt2=$db->prepare($query2);
    $stmt2->execute([$row["id"]]);
    $result2=$stmt2->fetchAll();                
} 
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

 }
?>