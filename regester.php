<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



?>  


<form method="POST" enctype="multipart/form-data">
    
    <label for="firstName">First Name: </label>
    <input type=text name=firstName id="firstName">
    <br><br>

    <label for="lastName">last Name: </label>
    <input type=text name=lastName id="lastName">
    <br><br>

    <label for="adress">Adress: </label><br>
    <textarea name="adress" id="adress" ></textarea>
    <br><br>


    <label for="country">select your country:</label>
    <select name="country" id="country" style="width:100px">
        <option value="Egypt">Egypt</option>
        <option value="ٍSudia">Sudia</option>
        <option value="Libya">Libya</option>
        <option value="Sudan">Sudan</option>
    </select>
    <br><br>

    
    <label for="gender" > Gender:  </label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male"> male </label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female"> female</label><br>
    <br><br>

    
    <label for="skills" > skills:  </label><br>
    <input type="checkbox" id="PHP" value="PHP" name="skills[]">
    <label for="PHP"> PHP</label><br>
    <input type="checkbox" id="js" value="js" name="skills[]">
    <label for="larval"> js</label><br>
    <input type="checkbox" id="HTML" value="HTML" name="skills[]">
    <label for= "html"> html</label>
    <br><br>

    <label for="department">Department: </label>
    <input type=text name=department id="department">


    <label for="userName">userName: </label>
    <input type=text name=userName id="userName">
    <br><br>

    <label for="password">Password: </label>
    <input type=password name=password id="password">
    <br><br>

    <label for="userfile">Upload a file:</label>
    <input type="file" name="userfile" id="userfile"/>

    <br><br>
    <input type="submit" value='regester'>
    <input type="reset" value='reset'>

</form>

<a href="index.php"> home</a>


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

    require_once("CRUD/addUser.php");

    }


}

// elseif ($_SERVER['REQUEST_METHOD']=='GET') {
//     echo "it is get";
//     echo $_SERVER['HTTP_REFERER'];

// }

?>