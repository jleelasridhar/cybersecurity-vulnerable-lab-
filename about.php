<html>
<head>
<title>About - CSM  Labs</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="container">
<div class="navbar">
    <div><strong>CSM Labs | Cyber Security Portal</strong></div>
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
  <h2>About CSM Labs</h2>  
  <p>
SecureShield Labs is a professional cybersecurity research and testing organization focused on identifying, analyzing, and mitigating modern digital threats. 
With the rapid growth of web applications, cloud platforms, and enterprise systems, security has become a critical requirement rather than an optional feature. 
Our team is dedicated to proactive security assessment, ensuring that vulnerabilities are detected before they can be exploited by malicious attackers.
</p>

<p>
We specialize in ethical hacking, penetration testing, vulnerability assessment, and secure system architecture review. 
By combining technical expertise with structured methodologies, we simulate real-world attack scenarios to evaluate system resilience. 
Our approach emphasizes prevention, early detection, and long-term security sustainability.
</p>
</div>

<div class="section">
    <h2>Our Mission</h2>
    <p>
Our mission is to provide enterprise-grade security services that help organizations safeguard their digital assets, customer data, and operational infrastructure. 
We aim to create a structured and reliable security testing framework that identifies risks at every level — from application logic flaws to network-level weaknesses.
</p>

<p>
Through ethical penetration testing and continuous monitoring strategies, we help organizations strengthen their cyber defense posture. 
We believe that effective cybersecurity is built on awareness, proactive testing, and continuous improvement.
</p>

</div>

<div class="section">
    <h2>Our Vision</h2>
    <p>
Our vision is to contribute to a digitally secure ecosystem where businesses can operate confidently without fear of cyber threats. 
As technology continues to evolve, cyber risks also grow in complexity, requiring adaptive and intelligent defense mechanisms.
</p>

<p>
SecureShield Labs envisions a future where security is integrated into every stage of development — from system design to deployment and maintenance. 
We strive to promote responsible security practices and encourage organizations to adopt a prevention-first mindset in cybersecurity.
</p>

</div>

<div class="section">
    <h2>Our Expertise</h2>

    <div class="card-container">
        <div class="card">
            <h3>Web Application Security</h3>
            <p>Testing for SQL Injection, XSS, CSRF, authentication flaws and logic vulnerabilities.</p>
        </div>

        <div class="card">
            <h3>Network Security</h3>
            <p>Identifying infrastructure weaknesses through structured vulnerability assessment.</p>
        </div>

        <div class="card">
            <h3>Security Awareness</h3>
            <p>Training teams to understand secure coding practices and cyber threat prevention.</p>
        </div>
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
