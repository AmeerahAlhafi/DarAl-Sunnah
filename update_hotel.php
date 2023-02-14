<?php
$title = 'Update Hotels';
include 'config.php';
include'template\header.php';


$id=$_GET['Hotel_id'];
if(isset($_GET['Hotel_id']) )
   $id=$_GET['Hotel_id'];
else
	header("Location:hotels.php");

  
$hotels = mysqli_query($conn, " SELECT * FROM hotels where Hotel_id='$id' limit 1");

    if($hotels){
        $hotel = mysqli_fetch_assoc($hotels);
        if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1)
        echo '<section class="w3l-mockup-form ">
        <div class=" container " >
                    <div class="content-wthree" style="margin: 20% 25% 2% 25%; ">
                        <h2>Update Hotels</h2>
                        
                        <form action="" enctype="multipart/form-data" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter hotel Name" value="'.$hotel['Name'].'"  required>
					        <input type="number" class="number" name="Price" placeholder="Enter at Price" value="'.$hotel['Price'].'"  required>
                            
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
                    move_uploaded_file($_FILES["imageFile"]["tmp_name"],"photo/Hotels/".$_FILES["imageFile"]["name"]);
                    
                    $image_name ="photo/Hotels/".$_FILES["imageFile"]["name"];
                     $sql = "UPDATE  hotels  SET name='$name',Price='$Price' ,Photo='$image_name' WHERE Hotel_id='$id'";

    
                }else{
                    $sql = "UPDATE  hotels  SET name='$name',Price='$Price' WHERE Hotel_id='$id'";

    
                  }

                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<div class='alert alert-info'>New hotel added successfully</div>";
                }else
                echo '<div class="alert alert-warning">There is an error</div>';
                header("Location:hotels.php");
            }
        }
    }

    include'template\footer.php' ;
?>