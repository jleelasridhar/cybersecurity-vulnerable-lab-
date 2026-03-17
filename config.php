<?php
$conn = mysqli_connect("localhost", "rajuser", "raj123", "vulnsite");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
