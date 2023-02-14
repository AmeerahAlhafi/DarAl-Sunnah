<?php
$title = 'Update restaurant';
include 'config.php';
include'template\header.php';


$id=$_GET['Restaurant_id'];
if(isset($_GET['Restaurant_id']) )
   $id=$_GET['Restaurant_id'];
else
	header("Location:restaurants.php");

  
$restaurants = mysqli_query($conn, " SELECT * FROM restaurant where Restaurant_id='$id' limit 1");

    if($restaurants){
        $restaurant = mysqli_fetch_assoc($restaurants);
        if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1)
        echo '<section class="w3l-mockup-form " style="background-image: url(images/banner.png);">
        <div class=" container " >
                    <div class="content-wthree" style="margin: 20% 25% 2% 25%; ">
                        <h2>Update restaurant</h2>
                        
                        <form action="" enctype="multipart/form-data" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter restaurant Name" value="'.$restaurant['Name'].'"  required>
					        <input type="number" class="number" name="Price" placeholder="Enter at Price" value="'.$restaurant['Price'].'"  required>
                            
                            <input type="file" name="imageFile" id="fileToUpload">
                            <button name="submit" class="btn" type="submit">Update</button>
                        </form>
                    </div>
        </div>
        </section>';

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $Price = mysqli_real_escape_string($conn, $_POST['Price']);

            if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1){


                if(is_uploaded_file($_FILES["imageFile"]["tmp_name"])){
                    move_uploaded_file($_FILES["imageFile"]["tmp_name"],"photo/Restaurants/".$_FILES["imageFile"]["name"]);
                    
                    $image_name ="photo/Restaurants/".$_FILES["imageFile"]["name"];
                     $sql = "UPDATE  restaurant  SET name='$name',Price='$Price' ,Photo='$image_name' WHERE Restaurant_id='$id'";

    
                }else{
                    $sql = "UPDATE  restaurant  SET name='$name',Price='$Price' WHERE Restaurant_id='$id'";

    
                  }

                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<div class='alert alert-info'>New restaurant added successfully</div>";
                }else
                echo '<div class="alert alert-warning">There is an error</div>';
                header("Location:restaurants.php");
            }
        }
    }

    include'template\footer.php' ;
?>