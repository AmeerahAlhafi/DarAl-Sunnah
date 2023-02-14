<?php
session_start();
ob_start();

include 'config.php';

if(isset($_SESSION['user_id']))
{
        $usr_id=$_SESSION["user_id"];


    
    if($_GET["fav_id"])
        $fav_id=$_GET["fav_id"];

    else
        header("Location:Gates.php? msg=There is an error");   

   


    $deps_id = mysqli_query($conn, "SELECT fav_id FROM favourites WHERE  user_id='$usr_id' and fav_id='$fav_id' and `fav_type`=3 LIMIT 1");

        if(mysqli_num_rows($deps_id) >0){
            
            $sql = "DELETE FROM favourites WHERE user_id='$usr_id' and fav_id='$fav_id' and `fav_type`=3";
            $msg= " Deleted successfully";
            if (!mysqli_query($conn, $sql)) {
                
                $msg= "Error  " . mysqli_error($conn);
            }
        
            header("Location:Gates.php? msg=$msg");
            
        }else{

            $sql = "INSERT INTO favourites (user_id,fav_id,fav_type) VALUES ('{$usr_id}','{$fav_id}',3)";
            $result = mysqli_query($conn, $sql);
            if ($result){
            $msg= "favourite added successfully";
                
            }else
            $msg= "Error  " . mysqli_error($conn);


            header("Location:Gates.php? msgg=$msg");

        }


}else{
    header("Location:Gates.php?msg=You should Login to choose favourite gates");
}

// header("Location:restaurants.php? msg=favourite added successfully");
?>