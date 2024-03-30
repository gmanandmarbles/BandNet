<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    header("location: music.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - BandNet</title>
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
        <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
	<div class="containerhome">
        <h1 class="website-name">BandNet</h1>

        <p class="tagline"></p>
		<br>
		<div class="copyrighthome">
		<p>© BandNet</a></p>
		</div>
    </div>

  
</body></html>
