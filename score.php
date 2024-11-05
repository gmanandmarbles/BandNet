<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Get the score title from the query parameter (e.g., ?score=cruelsummer)
$score_name = isset($_GET['score']) ? $_GET['score'] : null;

// Load the sheet music data from the JSON file
$scores = json_decode(file_get_contents('scores.json'), true);

// Find the selected score in the array
$selected_score = null;
if ($score_name && isset($scores['sheet_music'])) {
    foreach ($scores['sheet_music'] as $score) {
        if (strtolower($score['title']) === strtolower($score_name)) {
            $selected_score = $score;
            break;
        }
    }
}

if (!$selected_score) {
    echo "Score not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Details - BandNet</title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
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
        <h1 class="website-name"><?php echo htmlspecialchars($selected_score['title']); ?></h1>
        <h2>Composer: <?php echo htmlspecialchars($selected_score['composer']); ?></h2>
        <p><strong>Instruments:</strong> <?php echo htmlspecialchars(implode(', ', $selected_score['instruments'])); ?></p>

        <audio controls>
            <source src="<?php echo htmlspecialchars($selected_score['audio_url']); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <br>
        <a href="<?php echo htmlspecialchars($selected_score['file_url']); ?>" download>Download Sheet Music</a>
    </div>
</body>
</html>
