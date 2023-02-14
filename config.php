<?php

$conn = mysqli_connect("localhost", "root", "", "dar_alsunnah");

if (!$conn) {
    echo "Connection Failed";
}