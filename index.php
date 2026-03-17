<!DOCTYPE html>
<html>
<head>
<title>CSM Labs</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="container">
<!-- Navigation Bar -->
<div class="sidebar">
    <h2>CSM Labs</h2>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="blog.php">Cyber Blog</a>
    <a href="account.php">Dashboard</a>
    <a href="login.php">Login</a>
</div>
<!-- Hero Section -->

<div class="section" style="text-align:center;">
    <h1 style="font-size:36px;">Enterprise-Grade Cybersecurity Solutions</h1>
    <p style="font-size:18px;">
        Protecting digital infrastructure through advanced vulnerability assessment,
        ethical hacking, and proactive threat intelligence strategies.
    </p>
</div>

<!-- About Preview Section -->
<div class="section">
    <h2>Who We Are</h2>
    <p>
        SecureShield Labs is a cybersecurity research and testing organization dedicated 
        to protecting businesses from modern cyber threats. We simulate real-world attack 
        scenarios to identify vulnerabilities before malicious actors can exploit them.
    </p>
</div>

<!-- 🔐 Security Icons Section (Added Properly Here) -->
<div class="section">
    <h2>Our Security Standards</h2>

    <div class="card-container">
        <div class="card">
            <h3>🔐 Data Protection</h3>
            <p>
                We implement advanced encryption mechanisms and secure storage 
                practices to ensure sensitive data remains protected at all times.
            </p>
        </div>

        <div class="card">
            <h3>🛡 Threat Intelligence</h3>
            <p>
                Continuous vulnerability scanning and monitoring help detect 
                suspicious activities before they escalate into major incidents.
            </p>
        </div>

        <div class="card">
            <h3>⚡ Rapid Incident Response</h3>
            <p>
                Our structured response framework ensures quick mitigation 
                and minimal operational disruption during security events.
            </p>
        </div>
    </div>
</div>

<!-- Additional Trust Section -->
<div class="section">
    <h2>Why Organizations Trust Us</h2>
    <ul>
        <li>✔ Structured security assessment methodology</li>
        <li>✔ Ethical and responsible testing practices</li>
        <li>✔ Professional vulnerability reporting</li>
        <li>✔ Enterprise-focused risk mitigation strategies</li>
    </ul>
</div>

<!-- Footer -->
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
