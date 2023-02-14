<?php
include 'config.php';

$sql = "DELETE FROM hotels WHERE Hotel_id='" . $_GET["Hotel_id"] . "'";
$msg= "Record deleted successfully";
if(mysqli_query($conn, $sql)) {
    $msg= "Record deleted successfully";
} else {
    $msg= "Error deleting record: " . mysqli_error($conn);
}

header("Location:hotels.php? msg=$msg");
?>