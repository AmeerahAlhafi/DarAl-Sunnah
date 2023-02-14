<?php
include 'config.php';

$sql = "DELETE FROM restaurant WHERE Restaurant_id='" . $_GET["Restaurant_id"] . "'";
$msg= "Record deleted successfully";
if(mysqli_query($conn, $sql)) {
    $msg= "Record deleted successfully";
} else {
    $msg= "Error deleting record: " . mysqli_error($conn);
}

header("Location:restaurants.php? msg=$msg");
?>