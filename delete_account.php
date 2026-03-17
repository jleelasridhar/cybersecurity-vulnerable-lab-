<?php
session_start();
$conn = new mysqli("localhost", "rajuser", "raj123", "vulnsite");

if(!isset($_SESSION['userid'])){
    die("Login Required");
}

$user_id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$user_id'";
$conn->query($sql);

echo "User Deleted!";
?>
