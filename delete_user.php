<?php
include 'config.php';

$sql = "DELETE FROM users WHERE id='" . $_GET["user_id"] . "'";
$msg= "User deleted successfully";
if (mysqli_query($conn, $sql)) {
    $msg= "Record deleted successfully";
} else {
    $msg= "Error deleting record: " . mysqli_error($conn);
}

header("Location:users.php? msg=$msg");
?>