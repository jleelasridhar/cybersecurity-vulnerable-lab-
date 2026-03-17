<?php
$comment = "";

if(isset($_POST['submit'])){
    $comment = $_POST['comment'];   // No sanitization (Intentionally Vulnerable)
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Message Terminal</title>

<style>
body {
    background: radial-gradient(circle at top, #0f0f1a, #000000);
    font-family: monospace;
    text-align: center;
    color: #00ffff;
}

h1 {
    margin-top: 80px;
    font-size: 40px;
    color: #ff00ff;
    text-shadow: 0 0 20px #ff00ff;
}

textarea {
    width: 400px;
    height: 120px;
    background: black;
    color: #00ffff;
    border: 2px solid #00ffff;
    padding: 10px;
    font-family: monospace;
}

input[type=submit] {
    margin-top: 20px;
    padding: 10px 30px;
    background: black;
    color: #00ffff;
    border: 2px solid #00ffff;
    cursor: pointer;
    transition: 0.4s;
}

input[type=submit]:hover {
    background: #00ffff;
    color: black;
    box-shadow: 0 0 20px #00ffff;
}

.output {
    margin-top: 40px;
    padding: 20px;
    border: 1px solid #00ffff;
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
    box-shadow: 0 0 15px #00ffff;
}

a {
    color: #00ff00;
    text-decoration: none;
}

.footer {
    margin-top: 80px;
    color: #00ff00;
}
</style>
</head>

<body>

<h1>Message Injection Terminal</h1>

<form method="POST">
    <textarea name="comment" placeholder="Enter your message..."></textarea><br>
    <input type="submit" name="submit" value="Submit Message">
</form>

<?php
if($comment != ""){
    echo "<div class='output'>";
    echo "<h3>Message Output:</h3>";
    echo $comment;   // Vulnerable to XSS
    echo "</div>";
}
?>

<div class="footer">
    <br>
    <a href="index.php">← Back to Portal</a>
</div>

</body>
</html>
