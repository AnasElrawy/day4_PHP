<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


if ($_SERVER['HTTP_REFERER']=="http://localhost/php4/list.php" || $_SERVER['REQUEST_METHOD']=='POST') {


    try
    {
        require_once("db/conne.php");
    
        $query= "SELECT * FROM user where id=?";
    $stmt=$db->prepare($query);
    $stmt->execute([$_GET["id"]]);
    $result=$stmt->fetchAll();
    
        
        
        
        }
        
    
    

    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }
    


?>



<form method="POST" enctype="multipart/form-data">
    
    <label for="firstName">First Name: </label>
    <input type=text name=firstName id="firstName" value=<?php echo $result[0]["firstname"]; ?>>
    <br><br>

    <label for="lastName">last Name: </label>
    <input type=text name=lastName id="lastName" value=<?php echo $result[0]["secondname"]; ?>>
    <br><br>

    <label for="adress">Adress: </label><br>
    <textarea name="adress" id="adress" > <?php echo $result[0]["address"]; ?></textarea>
    <br><br>


    <label for="country">select your country:</label>
    <select name="country" id="country" style="width:100px" >
        <option value="Egypt" <?php if ($result[0]["country"] == "Egypt" ){echo "selected";}?>>Egypt</option>
        <option value="ٍSudia" <?php if ($result[0]["country"] == "Sudia" ){echo "selected";}?> >Sudia</option>
        <option value="Libya" <?php if ($result[0]["country"] == "Libya" ){echo "selected";}?> >Libya</option>
        <option value="Sudan" <?php if ($result[0]["country"] == "Sudan" ){echo "selected";}?> >Sudan</option>
    </select>
    <br><br>

    
    <label for="gender" > Gender:  </label>
    <input type="radio" id="male" name="gender" value="male" <?php if ($result[0]["gender"] == "male" ){echo "checked";}?>>
    <label for="male"> male </label>
    <input type="radio" id="female" name="gender" value="female" <?php if ($result[0]["gender"]=="female"){echo "checked";}?> >
    <label for="female"> female</label><br>
    <br><br>

    <?php
try {

    require_once("db/conne.php");


    $query2= "SELECT skill FROM skill where userid = ?";
    $stmt2=$db->prepare($query2);
    $stmt2->execute([$_GET["id"]]);
    $result2=$stmt2->fetchAll(PDO::FETCH_COLUMN, 0);                
} 
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}




?>


    
    <label for="skills" > skills:  </label><br>
    <input type="checkbox" id="PHP" value="PHP" name="skills[]" <?php if (strlen(array_search('PHP', $result2))){echo "checked";}?> >
    <label for="PHP"> PHP</label><br>
    <input type="checkbox" id="js" value="js" name="skills[]" <?php if (strlen(array_search('js', $result2))){echo "checked";}?>>
    <label for="larval"> js</label><br>
    <input type="checkbox" id="HTML" value="HTML" name="skills[]" <?php if (strlen(array_search('HTML', $result2))){echo "checked";}?>>
    <label for= "html"> html</label>
    <br><br>

    <label for="department">Department: </label>
    <input type=text name=department id="department"  value=<?php echo $result[0]["dep"]; ?>>


    <label for="userName">userName: </label>
    <input type=text name=userName id="userName" value=<?php echo $result[0]["username"]; ?>>
    <br><br>

    <label for="password">Password: </label>
    <input type=password name=password id="password" value=<?php echo $result[0]["username"]; ?>>
    <br><br>

    <label for="userfile">Upload a file:</label>
    <input type="file" name="userfile" id="userfile"  />

    <br><br>
    <input type="submit" value='updat'>
    <input type="reset" value='reset'>

</form>
 
 <a href='index.php'> home</a>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(!strlen($_POST["userName"])){
        echo "user name require";
    }

    elseif (!strlen($_POST["password"])) {
        echo "password require";
    }

    else {
        $flag=false;

        if($_FILES["userfile"]["name"]){

            $target_dir = "image/";
            $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
            $flag=true;
            move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file);
        }

    require_once("CRUD/update.php");

    }


}
   
}
?>