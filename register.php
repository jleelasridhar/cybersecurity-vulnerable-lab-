<?php
include("config.php");

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $query = "INSERT INTO users (username, email, password,contact) 
              VALUES ('$username', '$email', '$password','$contact')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Account Created Successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account - CSM Secured Labs</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="container">
<div class="section" style="max-width:400px; margin:auto; text-align:center;">
<h2>Create New Account</h2>

<form method="POST">
    Username: <br>
    <input type="text" name="username" required><br><br>

    Email: <br>
    <input type="email" name="email" required><br><br>
     Contact: <br>
    <input type="tel" name="contact" required><br><br>
    Password: <br>
    <input type="password" name="password" required><br><br>
    <input  type="submit" style="padding:10px 25px; font-size:16px; background:#00cfff; color:#000; border:none; border-radius:6px; cursor:pointer;" name="register" value="Register">
   </form>

<br>
     <p>Already have an account? <a href="login.php">Login Here</a></p>
</div>
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
