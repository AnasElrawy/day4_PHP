<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');


session_start();

if(empty($_SESSION['username'])){
    echo "you should login";
    echo "<a href='index.php'> home</a>";

 }

 else{

if($_SESSION['username'] == "admin" )

{
    require_once("CRUD/select.php");

}

elseif ($_SESSION['username']) {

    require_once("db/conne.php");


    $query= "SELECT * FROM user where username=?";
    $stmt=$db->prepare($query);
    $stmt->execute([$_SESSION['username'] ]);
    $result=$stmt->fetchAll();
    


}

?>


<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        <a href="index.php"> home</a>
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>

<a href="logout.php">logout</a>

    <table>

    <tr>
        <th>ID</td>
        <th>First Name</td>
        <th>Last name</th>
        <th>Adress</th>
        <th>Gender</th>
        <th>Country</th>
        <th>skills</th>
        <th>userName</th>
        <th>Image</th>
        <th>department</th>
        <th>buttons</th>
    </tr>



    <?php
       
    
    
    foreach($result as $row)
    {
        
    
 ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["firstname"]; ?></td>
            <td><?php echo $row["secondname"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["country"]; ?></td>
            <td>
                <?php


                    require("CRUD/selectSkill.php");

                    
                    foreach($result2 as $row2)
                    {
                        echo $row2["skill"].",";
                    }
                ?>
            </td>
            <td><?php echo $row["username"]; ?></td>
            <td>  <img src="<?php echo $row["image"]; ?>" style="object-fit:cover;
     		object-position: right;
            width:50px;
            height:70px;
            border: solid 1px #CCC"/> </td>
            <td><?php echo $row["dep"]; ?></td>
            <td>
                <button onclick="document.location='updateForm.php?id=<?php echo $row["id"]; ?>'">ubdate</button> 
                <button onclick="document.location='CRUD/delete.php?id=<?php echo $row["id"]; ?>'">delete</button> 
            </td>
        </tr>
        
        <?php
    }
?>
</table>

    <?php




 }


    // $resource=fopen('userData.txt','r');
    // // $data=fgets($resource);
    // // $data=fgetss($resource);
    // $data=fgetcsv($resource,100,",");
    // $data=fgetcsv($resource,100,",");
    
    // echo $data;
    // echo "<br>";
    // var_dump($data);
    // fclose($resource);
?>






