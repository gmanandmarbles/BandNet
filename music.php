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
            <li><a href="disclaimer.php">Disclaimer</a></li>
            <li><p class="welcomeName">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></p></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="containerhome"><br><br><br><br><br><br><br><br><br><br>
        <h1 class="website-name">Bandnet</h1>
        <table class="song-table">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Instruments</th>
            </tr>
            <tr>
                <td><a href="Music\cruelsummer.php">Cruel Summer</a></td>
                <td>Taylor Swift</td>
                <td>Flute, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Trombone, Bariton, Sousaphone, Snare drum, Tenor drums, Bass drums.</td>
            </tr>
            <tr>
                <td><a href="Music\fastcar.php">Fast Car</a></td>
                <td>Luke Combs</td>
                <td>Flute, Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Trombone, Baritone, Sousaphone, Snare drum, Tenor drum, Bass drum.</td>
            </tr>
            <tr>
                <td><a href="Music\feelinggood.php">Feeling Good</a></td>
                <td>Michael Buble</td>
                <td>Trumpet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trombone, Bass trombone, Electric guitar, Piano, Contrabass.</td>
            </tr>
            <tr>
                <td><a href="Music\gdfr.php">GDFR</a></td>
                <td>Flo Rida</td>
                <td>Piccolo, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Horn, Trombone, Tuba, Drumset, Stamp.</td>

            </tr>
            <tr>
                <td><a href="Music\IAINTWORRIED.php">I Ain't Worried</a></td>
                <td>OneRepublic</td>
                <td>Piccolo, Flute, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Horn in F, Trombone, Baritone, Tuba, Sousaphone, Glockenspiel, Xylophone.</td>
            </tr>
            <tr>
                <td><a href="Music\kungfufighting.php">Kung Fu Fighting</a></td>
                <td>Carl Douglas</td>
                <td>Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Bass trombone, Drumset, Piano, Bass guitar. </td>
            </tr>
            
        </table>
        <p class="bottombuttons">
    	    <a href="music.php">Previous Page&nbsp;&nbsp;|&nbsp;&nbsp;</a>
    	    <a href="music2.php">Next Page</a>
    	</p>
    </div>
</body>
</html>
