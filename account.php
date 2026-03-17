<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("config.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// 🔴 IDOR – Get ID from URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    die("No ID provided in URL");
}

// Fetch user based on URL ID (NOT session)
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}

if(mysqli_num_rows($result) == 0){
    die("User not found");
}

$user = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html>
<head>
<title>Dashboard - CSM Labs</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e);
    color: #00ffff;
    font-family: 'Courier New', monospace;
}

.neon-title {
    text-align: center;
    color: #00ffff;
    text-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff;
}

.dashboard-container {
    width: 60%;
    margin: 50px auto;
    text-align: center;
}

.profile-card {
    background: #111;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 20px #00ffff;
    text-align: left;
}

.profile-card p {
    font-size: 16px;
    margin: 10px 0;
}

.logout-btn {
    padding: 10px 20px;
    background: #00ffff;
    color: #000;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    box-shadow: 0 0 15px #00ffff;
}
#matrixCanvas {
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
}
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 220px;
    height: 100%;
    background: #0a0a1f;
    box-shadow: 0 0 20px #00ffff;
    padding-top: 30px;
}

.sidebar h2 {
    text-align: center;
    color: #00ffff;
    text-shadow: 0 0 10px #00ffff;
}

.sidebar a {
    display: block;
    padding: 15px;
    color: #00ffff;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #b026ff;
    box-shadow: 0 0 10px #b026ff;
}
.dashboard-container {
    margin-left: 250px;
}
.stats {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.card {
    flex: 1;
    background: rgba(20,20,40,0.8);
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 0 20px #00ffff;
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 30px #b026ff;
}
.profile-card {
    animation: glow 2s infinite alternate;
}

@keyframes glow {
    from { box-shadow: 0 0 10px #00ffff; }
    to { box-shadow: 0 0 25px #b026ff; }
}
#typing {
    color: #00ff41;
    text-shadow: 0 0 10px #00ff41;
    margin-left: 260px;
}
.welcome-container {
    width: 70%;
    margin: 40px auto;
    text-align: center;
}

#typing {
    font-size: 32px;
    font-weight: bold;
    line-height: 1.4;
    word-wrap: break-word;
    display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
overflow: hidden;
}
</style>

</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="container">
<div class="popup">
    ✔ Access Granted
</div>
<div class="sidebar">
    <h2>CSM Labs</h2>
    <a href="#">Dashboard</a>
    <a href="#">Labs</a>
    <a href="#">Threat Monitor</a>
    <a href="#">Reports</a>
    <a href="logout.php">Logout</a>
</div>
<div style="text-align:center; margin-top:20px;">
    <h3 id="clock"></h3>
</div>

<div class="card">
    <h3>System Terminal</h3>
    <div id="terminal"></div>
</div>
<div class="dashboard-container">
	
	<div class="stats">
    <div class="card">
        <h3>Threat Score</h3>
        <p><?php echo $user['threat_score']; ?>%</p>
    </div>

    <div class="card">
        <h3>Labs Assigned</h3>
        <p><?php echo $user['labs_assigned']; ?></p>
    </div>

    <div class="card">
        <h3>Tasks Completed</h3>
        <p><?php echo $user['tasks_completed']; ?></p>
    </div>
</div>
    <div class="welcome-container">
    <h2 style="text-align:center; font-size:30px;">
    Welcome "<span style="color:yellow; font-weight:bold;">
        <?php echo $user['username']; ?>
    </span>" to CSM Secured Labs
</h2>
</div>
    <h2 class="neon-title">🛡 CSM Labs - Cyber Dashboard</h2>
       <div class="profile-card">
        <p><strong>User ID:</strong> <?php echo $user['id']; ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Contact:</strong> <?php echo $user['contact']; ?></p>
        <p><strong>Security Level:</strong> <?php echo $user['security_level']; ?></p>
        <p><strong>Threat Score:</strong> <?php echo $user['threat_score']; ?></p>
        <p><strong>Labs Assigned:</strong> <?php echo $user['labs_assigned']; ?></p>
        <p><strong>Tasks Completed:</strong> <?php echo $user['tasks_completed']; ?></p>
        <p><strong>Last Login:</strong> <?php echo $user['last_login']; ?></p>
    </div>

    <br>

</div>
<div class="card">
    <h3>Website Preview Tool</h3>

    <form method="GET">
        <input type="text" name="url" 
        placeholder="Enter Website URL (example: https://example.com)" required>

        <button type="submit" class="btn">Fetch Website</button>
    </form>

    <div style="margin-top:15px;">
        <?php
        if(isset($_GET['url'])){
            $url = $_GET['url'];

            echo "<pre>";
            echo htmlspecialchars(file_get_contents($url));
            echo "</pre>";
        }
        ?>
    </div>
</div>
<div class="footer">
    © 2026 CSM Labs
</div>
</div>
<script>
const canvas = document.getElementById("matrixCanvas");
const ctx = canvas.getContext("2d");

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

const letters = "01CSMLABS010101HACKER";
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
<script>
const canvas = document.getElementById("matrixCanvas");
const ctx = canvas.getContext("2d");

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

const letters = "01CSMLABS010101HACKER";
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
<script>
const username = "<?php echo htmlspecialchars($username); ?>";
const text = `Welcome to CSM Labs "${username}" Secure Cyber Dashboard`;

let i = 0;

function typeEffect(){
    if(i < text.length){
        document.getElementById("typing").innerHTML += text.charAt(i);
        i++;
        setTimeout(typeEffect, 40);
    }
}

typeEffect();
</script>
<script>
setTimeout(function(){
    const element = document.getElementById("typing");
    element.innerHTML = element.innerHTML.replace(username, 
        '<span style="color:yellow; font-weight:bold;">' + username + '</span>');
}, 2000);
</script>
<script>
const terminal = document.getElementById("terminal");
const messages = [
    "Initializing secure protocol...",
    "Bypassing firewall...",
    "Access granted ✔",
    "Decrypting data...",
    "System secure."
];

let i = 0;

function typeLine() {
    if (i < messages.length) {
        let line = document.createElement("p");
        line.innerText = messages[i];
        line.style.color = "#00ff41";
        terminal.appendChild(line);
        i++;
        setTimeout(typeLine, 1000);
    }
}

typeLine();
</script>
<script>
setTimeout(function(){
    document.getElementById("alertBox").style.display = "block";
}, 7000);
</script>

</body>
</html>
