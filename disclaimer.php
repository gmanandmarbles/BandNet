<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disclaimer - Bandnet</title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="line.css">
    <script src="script.js" defer=""></script>
</head>
<body>
    <nav class="nav">
        <i class="uil uil-bars navOpenBtn"></i>
        <div class="logo">
            <img src="<?php echo empty($_SESSION["school"]) ? 'logo.png' : htmlspecialchars($_SESSION["school"]) . '.png'; ?>" alt="Logo">
        </div>
        <ul class="nav-links">
            <i class="uil uil-times navCloseBtn"></i>
            <li><a href="index.php">Home</a></li>
            <li><a href="music.php">Music</a></li>
            <li><p class="welcomeName">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></p></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="containerhome"><br><br><br><br><br><br><br><br><br><br>
        <h1 class="website-name">Disclaimer</h1>

<p>Thank you for your interest in utilizing the sheet music available on BandNet. Before accessing and utilizing any sheet music from our platform, please read and acknowledge the following disclaimer:</p>

<ol>
  <li><strong>Ownership and Permission:</strong> The sheet music available on BandNet remains the intellectual property of its original creators or copyright holders. Users are reminded that permission must be sought from the original creators or copyright holders before performing or using the sheet music in any commercial or public capacity.</li>
  
  <li><strong>Accuracy and Authenticity:</strong> While we endeavor to provide accurate and authentic sheet music, BandNet cannot guarantee the absolute accuracy of every piece. Users are encouraged to cross-reference with reliable sources and exercise their own discretion when using the provided sheet music.</li>
  
  <li><strong>Use at Your Own Risk:</strong> The use of sheet music from BandNet is at your own risk. BandNet and its affiliates shall not be held liable for any damages, losses, or disputes arising from the use of the sheet music, including but not limited to inaccuracies, errors, or copyright infringement.</li>
  
  <li><strong>Professional Advice:</strong> BandNet is not a substitute for professional music instruction or consultation. Users are advised to consult qualified music educators or professionals for guidance on interpreting and utilizing sheet music effectively.</li>
  
  <li><strong>Copyright Compliance:</strong> Users are responsible for ensuring compliance with all applicable copyright laws and regulations when using sheet music from BandNet. It is the user's responsibility to obtain proper permissions or licenses for any commercial or public performances of copyrighted material.</li>
</ol>

<p>By accessing and using the sheet music available on BandNet, you acknowledge that you have read, understood, and agreed to abide by the terms of this disclaimer. BandNet reserves the right to update or modify this disclaimer at any time without prior notice.</p>

<p>For any questions or concerns regarding this disclaimer or the use of sheet music on BandNet, please contact whomever your BandNet administrator is.</p>

        
</body>
</html>
