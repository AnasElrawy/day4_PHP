<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');



if(empty($_SESSION['username'])){ 
    ?>

<form method= "POST">


<label for="userName">userName: </label>
    <input type=text name=userName id="userName">
    <br><br>

    <label for="password">Password: </label>
    <input type=password name=password id="password">
    <br><br>

    <input type="submit" value='login'>
</form>



<?php 
}
else {
    echo "you are login";
    // header("Location: welcom.php");
}
if(!empty($_POST['userName'])&&!empty($_POST['password'])){
    
    $userName = $_POST['userName'];
    $password = $_POST['password'];


    if($userName=="admin" && $password=="123")
    {

        echo"adaminasdasdasd";


        $_SESSION['username'] = $userName;
        header("Location: welcom.php");


    }
    else{



        require_once("db/conne.php");

        try{

                $query= "SELECT * FROM user where userName='$userName'";
            $stmt=$db->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll();
            // var_dump($result);
            // echo "<br>".$result[0]["username"]."<br>";
        
        
            if ($userName == $result[0]["username"]  && $password == $result[0][ "password"] ) {

                    $_SESSION['username'] = $userName;
                $_SESSION['id'] = $result["id"];
                header("Location: welcom.php");
            
            }

               else{
                echo "<center><span style='color: darkred;'>Wrong username or password</span></center>";
            }
        

        
        }catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
    ?>