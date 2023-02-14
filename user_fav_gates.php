<?php
$title = 'User Favourites gates';

include 'config.php';
// include'template\header.php';
?> 


<?php



	
if(isset($_SESSION['user_id']))
$usr_id=$_SESSION["user_id"];
$favorites=[];
if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] ==true)
{
	$rows = mysqli_query($conn, "SELECT fav_id FROM favourites WHERE  user_id='$usr_id' and fav_type='3' ");
	while ($row = mysqli_fetch_assoc($rows)){
		array_push($favorites,$row['fav_id']);	
	};
}

if($favorites){
echo '';
$gates = mysqli_query($conn, " SELECT * FROM gates WHERE Door_id IN(".implode(',',$favorites).")");
if(mysqli_num_rows($gates)){
    echo '<div class="row" style="padding:3%">';
    while($gate = mysqli_fetch_assoc($gates)):
        echo '
		<div class= "col-md-3 col-lg-3"> 
		<div class=" card text-dark shadow mt-2 " style="height: 21rem;text-align: center; border-radius: 20px;margin: 10px;">
		 <div class="card-body">
		 <img src="'.$gate['Photo'].'" witdh="150px" height="150px">
		 <h3 style="margin-top:10px" class="card-title"> '.$gate['Name'].'</h3 >
		 
		 <h4 style="margin-top:20px" class="card-title"> '.$gate['Basic_information'].'</h4 >
		 <a class= "btn btn-outline-success" style="hieght:38px"  href="'.$gate['Location'] .'">Display</a>
		 <br>	
		</div>
		</div>
      </div>';         
   
     endwhile;
echo '</div>';


}else{
echo '<div class="alert alert-danger text-center"> Nothing</div>';
}



echo '';

}else{
	echo '<div class="alert alert-danger text-center"> Nothing</div>';
	}


?> 