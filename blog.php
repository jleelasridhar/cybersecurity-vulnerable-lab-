<?php
$comments_file = "comments.txt";

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    echo "<p>" . $comment . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Blog - CSM Labs</title>
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

<div class="section">
    <h2>Latest Cybersecurity Insights</h2>
    <p>
        Cybersecurity is evolving rapidly as organizations increasingly rely on digital platforms, 
        cloud infrastructure, and interconnected systems. With the growth of technology, the 
        sophistication of cyber threats has also increased significantly.
    </p>

    <p>
        From injection attacks and authentication bypass techniques to data breaches and ransomware,
        modern applications must be designed with security at every layer. Proactive vulnerability 
        assessment and secure coding practices play a critical role in protecting sensitive information.
    </p>

    <p>
        At SecureShield Labs, we continuously analyze emerging threat patterns and study real-world 
        attack scenarios to help organizations strengthen their digital defenses and maintain trust.
    </p>
</div>
<div class="section">
    <h3>Understanding Web Application Vulnerabilities</h3>
    <p>
        Modern web applications face multiple threats such as injection attacks,
        authentication bypass, session hijacking, and misconfiguration issues.
        Regular security assessments help organizations stay protected.
    </p>
</div>
<div class="section">
    <h3>Trending Security Topics</h3>
    <ul>
        <li>✔ Secure Authentication Mechanisms</li>
        <li>✔ SQL Injection Prevention Strategies</li>
        <li>✔ Cross-Site Scripting (XSS) Awareness</li>
        <li>✔ Secure Session Management</li>
        <li>✔ Data Encryption & Secure Storage</li>
    </ul>
</div>

<div class="section">
    <h3>Comment Section</h3>

    <form method="POST">
        <textarea name="comment" placeholder="Write your comment..." 
style="width:100%; height:150px; padding:10px; border-radius:8px; border:1px solid #00cfff;" 
required></textarea>
       <button type="submit" 
style="padding:10px 25px; font-size:16px; background-color:#00cfff; color:#000; border:none; border-radius:6px; cursor:pointer;">
Post Comment
</button>
    </form>

    <hr>

    <h4>Recent Comments:</h4>
    <div class="comments-box" 
style="background:#111; padding:15px; border-radius:8px; border:1px solid #00cfff; margin-top:15px;">
        <?php
        if(file_exists($comments_file)){
            echo nl2br(file_get_contents($comments_file));
        }
        ?>
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
