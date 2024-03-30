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

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Bandnet</title>
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
        </ul>
    </nav>
	<div class="containerhome">
        <h1 class="website-name">Bandnet</h1>
        <div class="grid">
            <a href="cruelsummer.pjp" class="grid-item">

            <h3>Cruel Summer</h3>
            <p>Taylor Swift</p>
            </a>
            <a href="fastcar.php" class="grid-item">

            <h3>Fast Car</h3>
            <p>Luke Combs</p>
            </a>
            <a href="feelinggood.php" class="grid-item">

            <h3>Feeling Good</h3>
            <p>Michael Buble</p>
            </a>

            <a href="gdfr.php" class="grid-item">

            <h3>GDFR</h3>
            <p>Flo Rida</p>
            </a>

            <a href="IAINTWORRIED.php" class="grid-item">

            <h3>I Ain't Worried</h3>
            <p>OneRepublic</p>
            </a>
            <a href="kungfufighting.php" class="grid-item">

            <h3>Kung Fu Fighting</h3>
            <p></p>
            </a>
            <a href="singsingsing.php" class="grid-item">

            <h3>Sing Sing Sing!</h3>
            <p></p>
            </a>

            <a href="thezamboni.php" class="grid-item">
            <h3>The Zamboni</h3>
            <p></p>
            </a>
            <a href="whistle.php" class="grid-item">
            <h3>Whistle</h3>
            <p>Flo Rida</p>
            </a>
            <a href="ydkybcmm.php" class="grid-item">
            <h3>You Don't Know You're Beautiful - Call Me Maybe</h3>
            <p>Mashup</p>
            </a>
    </div>
        <p class="tagline"></p>
		<br>
		<div class="copyrighthome">
		<p>© Bandnet</a></p>
		</div>
    </div>

  
</body></html>
