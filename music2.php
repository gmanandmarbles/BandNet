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
                <td><a href="Music\singsingsing.php">Sing Sing Sing!</a></td>
                <td>Benny Goodman</td>
                <td>Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Acoustic guitar, Piano, Contrabass, Drumset.</td>
            </tr>
            <tr>
                <td><a href="Music\thezamboni.php">The Zamboni</a></td>
                <td>Nicholas D</td>
                <td>Flute, Oboe, Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Horn, Piano, trumpet, Trombone, Tuba, Timpani, Bass drum.</td>
            </tr>
            <tr>
                <td><a href="Music\whistle.php">Whistle</a></td>
                <td>Flo Rida</td>
                <td>Flutes, Clarinet, Alto saxophone, Tenor saxophone, Trumpet, Mellophone, Trombone, Tuba, Piano.</td>
            </tr>
            <tr>
                <td><a href="Music\ydkybcmm.php">You Don't Know You're Beautiful - Call Me Maybe</a></td>
                <td>Mashup (One Direction, and Carly Rae Jepson)</td>
                <td> Drumset, C Instrument (Treble and Bass), B-Flat instrument (Treble and Bass), E-Flat instrument (Treble).</td>
            </tr>
            <tr>
                <td><a href="Music\flowers.php">Flowers</a></td>
                <td>Miley Cyrus</td>
                <td>Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Electric bass, Drumset</td>
            </tr>
            <tr>
                <td><a href="Music\dancingqueen.php">Dancing Queen</a></td>
                <td>Abba</td>
                <td>Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Electric guitar, Piano</td>
            </tr>
            
            <!-- Add more rows as needed -->
        </table>
        <p class="bottombuttons">
    	    <a href="music.php">Previous Page&nbsp;&nbsp;|&nbsp;&nbsp;</a>
    	    <a href="music3.php">Next Page</a>
    	</p>
    </div>
</body>
</html>
