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
<style>

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
            </tr>
            <tr>
                <td><a href="cruelsummer.php">Cruel Summer</a></td>
                <td>Taylor Swift</td>
            </tr>
            <tr>
                <td><a href="fastcar.php">Fast Car</a></td>
                <td>Luke Combs</td>
            </tr>
            <tr>
                <td><a href="feelinggood.php">Feeling Good</a></td>
                <td>Michael Buble</td>
            </tr>
            <tr>
                <td><a href="gdfr.php">GDFR</a></td>
                <td>Flo Rida</td>
            </tr>
            <tr>
                <td><a href="IAINTWORRIED.php">I Ain't Worried</a></td>
                <td>OneRepublic</td>
            </tr>
            <tr>
                <td><a href="kungfufighting.php">Kung Fu Fighting</a></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="singsingsing.php">Sing Sing Sing!</a></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="thezamboni.php">The Zamboni</a></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="whistle.php">Whistle</a></td>
                <td>Flo Rida</td>
            </tr>
            <tr>
                <td><a href="ydkybcmm.php">You Don't Know You're Beautiful - Call Me Maybe</a></td>
                <td>Mashup</td>
            </tr>
            <tr>
                <td><a href="flowers.php">Flowers</a></td>
                <td>Miley Cyrus</td>
            </tr>
            <tr>
                <td><a href="dancingqueen.php">Dancing Queen</a></td>
                <td>Abba</td>
            </tr>
            <tr>
                <td><a href="perfect.php">Perfect</a></td>
                <td>Ed Sheeran</td>
            </tr>
            <tr>
                <td><a href="september.php">September</a></td>
                <td>Earth, Wind, and Fire</td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
    </div>
</body>
</html>
