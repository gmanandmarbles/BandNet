<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Load scores from JSON file
$scores_json = file_get_contents('scores.json');
$scores_data = json_decode($scores_json, true);

// Process form submission
$selected_instruments = isset($_GET['instruments']) ? $_GET['instruments'] : [];

$filtered_scores = [];
if (empty($selected_instruments)) {
    // No filters applied, show all scores
    $filtered_scores = $scores_data['sheet_music'];
} else {
    // Filter scores based on selected instruments
    foreach ($scores_data['sheet_music'] as $score) {
        // Check if any selected instrument matches the score's instruments
        $score_instruments = $score['instruments'];
        if (array_intersect($selected_instruments, $score_instruments)) {
            $filtered_scores[] = $score;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music - BandNet</title>
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
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="containerhome">
        <h1 class="website-name">Bandnet</h1>

        <!-- Multi-select filter for instruments -->
        <form method="GET" action="music.php">
            <label for="instruments">Filter by Instruments:</label>
            <select name="instruments[]" id="instruments" multiple>
                <?php
                // Get all unique instruments from the scores
                $all_instruments = [];
                foreach ($scores_data['sheet_music'] as $score) {
                    $all_instruments = array_merge($all_instruments, $score['instruments']);
                }
                $all_instruments = array_unique($all_instruments);
                
                // Generate the options for the multi-select dropdown
                foreach ($all_instruments as $instrument) {
                    $selected = in_array($instrument, $selected_instruments) ? 'selected' : '';
                    echo "<option value=\"$instrument\" $selected>$instrument</option>";
                }
                ?>
            </select>
            <button type="submit">Apply Filters</button>
        </form>

        <!-- Display filtered sheet music -->
        <table class="song-table">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Instruments</th>
            </tr>
            <?php foreach ($filtered_scores as $score): ?>
            <tr>
                <td><a href="music/<?= urlencode($score['title']) ?>.php"><?= htmlspecialchars($score['title']) ?></a></td>
                <td><?= htmlspecialchars($score['composer']) ?></td>
                <td><?= htmlspecialchars(implode(', ', $score['instruments'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p class="bottombuttons">
            <a href="music.php">Previous Page&nbsp;&nbsp;|&nbsp;&nbsp;</a>
            <a href="music2.php">Next Page</a>
        </p>
    </div>
</body>
</html>
