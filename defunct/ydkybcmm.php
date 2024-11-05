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
    <title>Music - BandNet</title>
    <link rel="stylesheet" href="/newstyle.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="/line.css">
   <script src="/script.js" defer=""></script>
  </head>
  <body>
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
            <div class="logo">
            <img src="<?php echo empty($_SESSION["school"]) ? '/logo.png' : '/' . htmlspecialchars($_SESSION["school"]) . '.png'; ?>" alt="Logo">

            </div>
      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="/index.php">Home</a></li>
        <li><a href="/music.php">Music</a></li>
        <li><p class="welcomeName">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></p></li>
        </ul>
    </nav>
	<div class="containerhome">
        <h1 class="website-name">BandNet</h1>
        <h1>You Don't Know You're Beautiful - Call Me Maybe</h1>

<div>
  <p>Mashup</p>
  <p>Drumset, C Instrument (Treble and Bass), B-Flat instrument (Treble and Bass), E-Flat instrument (Treble).</p>
  <audio controls>
    <source src="Scores/You Don_t Know You_re Beautiful - Call Me Maybe (Mashup)/14989654.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <br>
  <a href="Scores/You Don_t Know You_re Beautiful - Call Me Maybe (Mashup)/YouDontKnowYoureBeatiful.zip" download>Download Sheet Music</a>
</div>
        <p class="tagline"></p>
		<br>
		<div class="copyrighthome">
		<p>© Bandnet</a></p>
		</div>
    </div>

  
</body></html>
