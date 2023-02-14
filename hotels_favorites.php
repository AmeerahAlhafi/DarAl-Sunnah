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
        header("Location:hotels.php? msg=There is an error");   

    

    $deps_id = mysqli_query($conn, "SELECT fav_id FROM favourites WHERE  user_id='$usr_id' and fav_id='$fav_id' and `fav_type`=2 LIMIT 1");

        if(mysqli_num_rows($deps_id) >0){
            
            $sql = "DELETE FROM favourites WHERE user_id='$usr_id' and fav_id='$fav_id' and `fav_type`=2";
            $msg= " Deleted successfully";
            if (!mysqli_query($conn, $sql)) {
                
                $msg= "Error  " . mysqli_error($conn);
            }
        
            header("Location:hotels.php? msg=$msg");
            
        }else{

            $sql = "INSERT INTO favourites (user_id,fav_id,fav_type) VALUES ('{$usr_id}','{$fav_id}',2)";
            $result = mysqli_query($conn, $sql);
            if ($result){
            $msg= "favourite added successfully";
                
            }else
            $msg= "Error" . mysqli_error($conn);


            header("Location:hotels.php? msgg=$msg");

        }


}else{
    header("Location:hotels.php?msg=You should Login to choose favourite hotel");
}

// header("Location:restaurants.php? msg=favourite added successfully");
?>