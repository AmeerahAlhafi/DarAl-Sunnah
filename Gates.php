<?php
$title = 'Gates';
include'config.php';
include'./template/header.php';?>
<br><br>
<?php


if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<div class='container'>
    <div class='alert alert-danger'>$msg</div>
    </div>";
   
 }

 
if(isset($_GET['msgg'])) {
    $msgg = $_GET['msgg'];
    echo "<div class='container'>
    <div class='alert alert-success'>$msgg</div>
    </div>";
 }

if(isset($_SESSION['user_id']))
    $usr_id=$_SESSION["user_id"];
$favorites=[];
	if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] ==true)
	{
		$rows = mysqli_query($conn, "SELECT fav_id FROM favourites WHERE  user_id='$usr_id' and fav_type=3 ");
		while ($row = mysqli_fetch_assoc($rows)){
			array_push($favorites,$row['fav_id']);	
		};
	}
echo '<br>';
$gates = mysqli_query($conn, " SELECT * FROM gates ");
if(mysqli_num_rows($gates)){
    echo '<div class="row" style="padding:4%">';
    while($gate = mysqli_fetch_assoc($gates)):
	echo '
	<div class= "col-md-3 col-lg-3" style="margin-bottom:80px"> 
   <div class=" card text-dark shadow mt-8 " style="height: 27rem;text-align: center; border-radius: 20px;margin: 10px;">
	<div class="px-4 d-flex align-items-center flex-column border-radius: 20px;margin: 10px;" style="height: 23rem;">
	<img src="'.$gate['Photo'].'" class="rounded-circle"style="margin-top:-55px" witdh="150px" height="150px">
	<h3 style="margin-top:10px" class="card-title"> '.$gate['Name'].'</h3 >
	<h4 style="margin-top:20px" class="card-title"> '.$gate['Basic_information'].'</h4 >

	
	'; 
	if(!isset($_SESSION['admin']))
		{
			if (in_array($gate['Door_id'], $favorites)) {
				echo '
				<a style="color:#D81B60;margin-top:auto" href="gates_favorites.php?fav_id=';echo $gate['Door_id'] .'"><i class="fa-solid fa-2x fa-heart"></i></a>';
			}else{
				echo '
				<a style="color:#9FA6B2;margin-top:auto" href="gates_favorites.php?fav_id=';echo $gate['Door_id'] .'"><i class="fa-regular fa-2x fa-heart"></i></a>';
			}	
		}
   
	if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1)
	{echo '
			<a class= "btn btn-danger"   href="delete_gate.php?Door_id=';echo $gate['Door_id'] .'">Delete</a> <br>
			<a class= "btn btn-warning"   href="update_gate.php?Door_id=';echo $gate['Door_id'].'">Update</a>';
		}
		echo'
		<br> <br><a class= " btn btn-outline-success" style="hieght:38px; width:100%; margin-top:auto"  href="'.$gate['Location'] .'">Display</a>
		
		<br>
		';
	echo'	
	</div>
	</div>
  </div>';         
   
     endwhile;
echo '</div>';

}else{
echo '<div class="alert alert-danger text-center"> Nothing</div>';
}
echo '<br><br>';

if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1)
echo '<section class="w3l-mockup-form " >
<div class=" container " >
	
	
		   
			<div class="content-wthree" style="margin: 2% 25% 2% 25%; ">
				<h2>Add New Gate</h2>
				
				<form action="" enctype="multipart/form-data" method="post">
					<input type="text" class="name" name="name" placeholder="Enter Name"  required>
					<input type="number" class="number" name="Basic_information" placeholder="Enter Basic Information"  required>
					<input type="text" class="name" name="Location" placeholder="Enter Location"  required>
					<input type="file" name="imageFile" id="fileToUpload">

					<button name="submit" class="btn" type="submit">Add</button>
				</form>
			   
			</div>
	
	
</div>
</section>';
	if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $Basic_information = mysqli_real_escape_string($conn, $_POST['Basic_information']);
        $Location = mysqli_real_escape_string($conn, $_POST['Location']);
        if(isset($_SESSION['admin']) and $_SESSION['admin'] ==1){
			if(is_uploaded_file($_FILES["imageFile"]["tmp_name"])){
				move_uploaded_file($_FILES["imageFile"]["tmp_name"],"photo/Door/".$_FILES["imageFile"]["name"]);
				
				$image_name ="photo/Door/".$_FILES["imageFile"]["name"];
				$sql = "INSERT INTO gates (name,Basic_information,Location,Photo) VALUES ('{$name}','{$Basic_information}','{$Location}','{$image_name}')";

			}else{
				$sql = "INSERT INTO gates (name,Basic_information,Location) VALUES ('{$name}','{$Basic_information}','{$Location}')";

			  }


            $result = mysqli_query($conn, $sql);
			if ($result){
				echo "<section ><div class='alert alert-info'>New gate added successfully</div> </section>";
			}else
			echo '<section > <div class="alert alert-warning">There is an error</div> </section>';
			header("Location:Gates.php");
        }
	}
echo '<br>';?>
<?php
include'template\footer.php' ;?> 



