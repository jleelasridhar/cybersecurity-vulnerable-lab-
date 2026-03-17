<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];

        header("Location: account.php?id=" . $row['id']);
        exit();

    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login - CSM Labs</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="container">
<div class="navbar">
    <div><strong>CSM Labs | Cyber Security Portal Labs</strong></div>
    <div class="sidebar">
    <h2>CSM Labs</h2>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="blog.php">Cyber Blog</a>
    <a href="account.php">Dashboard</a>
    <a href="login.php">Login</a>
</div>
</div>

<div class="section" style="max-width:400px; margin:auto; text-align:center;">
    <h2>Member Login</h2>
    <p>Access your secure dashboard</p>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"
        style="width:100%; padding:10px; margin:8px 0; border-radius:6px; border:1px solid #00cfff;" required>

        <input type="password" name="password" placeholder="Password"
        style="width:100%; padding:10px; margin:8px 0; border-radius:6px; border:1px solid #00cfff;" required>

        <button type="submit"
        style="padding:10px 25px; font-size:16px; background:#00cfff; color:#000; border:none; border-radius:6px; cursor:pointer;">
        Login Securely
        </button>
	<br> <br>
<a href="register.php">
    <button type="button" style="padding:10px 25px; font-size:16px; background:#00cfff; color:#000; border:none; border-radius:6px; cursor:pointer;">Create New Account</button>
</a>  
  </form>
</div>
<div class="footer">
    © 2026 CSM Labs | Academic Demonstration Project
</div>
</div>
<script>
const canvas = document.getElementById("matrixCanvas");
const ctx = canvas.getContext("2d");

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

const letters = "01CSMLABS010101HACK";
const fontSize = 14;
const columns = canvas.width / fontSize;
const drops = [];

for(let x = 0; x < columns; x++)
    drops[x] = 1;

function draw(){
    ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.fillStyle = "#00ff41";
    ctx.font = fontSize + "px monospace";

    for(let i = 0; i < drops.length; i++){
        const text = letters.charAt(Math.floor(Math.random() * letters.length));
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);

        if(drops[i] * fontSize > canvas.height && Math.random() > 0.975)
            drops[i] = 0;

        drops[i]++;
    }
}
setInterval(draw, 33);
</script>
</body>
</html>
