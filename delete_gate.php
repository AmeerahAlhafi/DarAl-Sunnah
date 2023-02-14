<?php
include 'config.php';

$sql = "DELETE FROM gates WHERE Door_id='" . $_GET["Door_id"] . "'";
$msg= "Record deleted successfully";
if(mysqli_query($conn, $sql)) {
    $msg= "Record deleted successfully";
} else {
    $msg= "Error deleting record: " . mysqli_error($conn);
}

header("Location:Gates.php? msg=$msg");
?>