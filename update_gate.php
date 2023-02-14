<?php
$title = 'Update gate';
include 'config.php';
include'template\header.php';


$id=$_GET['Door_id'];
if(isset($_GET['Door_id']) )
   $id=$_GET['Door_id'];
else
	header("Location:Gates.php");

  
$gates = mysqli_query($conn, " SELECT * FROM gates where Door_id='$id' limit 1");

    if($gates){
        $gate = mysqli_fetch_assoc($gates);
        if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1)
        echo '<section class="w3l-mockup-form " style="background-image: url(images/banner.png);">
        <div class=" container " >
                    <div class="content-wthree" style="margin: 20% 25% 2% 25%; ">
                        <h2>Update gate</h2>
                        
                        <form action="" enctype="multipart/form-data" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter gate Name" value="'.$gate['Name'].'"  required>
					        <input type="number" class="number" name="Basic information" placeholder="Enter at Basic information" value="'.$gate['Basic_information'].'"  required>
                            
                            <input type="file" name="imageFile" id="fileToUpload">
                            <button name="submit" class="btn" type="submit">Update</button>
                        </form>
                    </div>
        </div>
        </section>';

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $Basic_information = mysqli_real_escape_string($conn, $_POST['Basic_information']);

            if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1){


                if(is_uploaded_file($_FILES["imageFile"]["tmp_name"])){
                    move_uploaded_file($_FILES["imageFile"]["tmp_name"],"photo/Door/".$_FILES["imageFile"]["name"]);
                    
                    $image_name ="photo/Door/".$_FILES["imageFile"]["name"];
                     $sql = "UPDATE  gates  SET name='$name',Basic_information='$Basic_information' ,Photo='$image_name' WHERE Door_id='$id'";

    
                }else{
                    $sql = "UPDATE  gates  SET name='$name',Basic_information='$Basic_information' WHERE Door_id='$id'";

    
                  }

                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<div class='alert alert-info'>New gate added successfully</div>";
                }else
                echo '<div class="alert alert-warning">There is an error</div>';
                header("Location:Gates.php");
            }
        }
    }

    include'template\footer.php' ;
?>