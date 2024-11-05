<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Load the sheet music data from the JSON file
$scores = json_decode(file_get_contents('scores.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        </ul>
    </nav>

    <div class="containerhome">
        <h1 class="website-name">BandNet - Sheet Music Collection</h1>

        <!-- Filter Form -->
        <div class="filter-container">
            <form id="filterForm">
                <input type="text" id="searchTitle" placeholder="Search by title..." />
                <select id="filterComposer">
                    <option value="">Select Composer</option>
                    <?php
                        // Generate composer filter options
                        $composers = array_unique(array_map(function($score) {
                            return $score['composer'];
                        }, $scores['sheet_music']));
                        foreach ($composers as $composer) {
                            echo "<option value=\"" . htmlspecialchars($composer) . "\">" . htmlspecialchars($composer) . "</option>";
                        }
                    ?>
                </select>

                <select id="filterInstrument">
                    <option value="">Select Instrument</option>
                    <?php
                        // Generate instrument filter options
                        $instruments = array_unique(array_merge(...array_map(function($score) {
                            return $score['instruments'];
                        }, $scores['sheet_music'])));
                        foreach ($instruments as $instrument) {
                            echo "<option value=\"" . htmlspecialchars($instrument) . "\">" . htmlspecialchars($instrument) . "</option>";
                        }
                    ?>
                </select>

                <button type="submit">Filter</button>
            </form>
        </div>

        <!-- Table to display the scores -->
        <table class="song-table" id="scoreTable">
            <tr>
                <th>Title</th>
                <th>Composer</th>
                <th>Instruments</th>
            </tr>
            <?php foreach ($scores['sheet_music'] as $score): ?>
            <tr class="scoreRow" data-composer="<?php echo htmlspecialchars($score['composer']); ?>" data-instruments="<?php echo implode(",", $score['instruments']); ?>">
                <td><a href="score.php?score=<?php echo urlencode($score['title']); ?>"><?php echo htmlspecialchars($score['title']); ?></a></td>
                <td><?php echo htmlspecialchars($score['composer']); ?></td>
                <td><?php echo htmlspecialchars(implode(", ", $score['instruments'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p class="bottombuttons">
            <a href="music2.php">Next Page</a>
        </p>
    </div>

    <script>
        // Filter function for dynamically filtering the music
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const titleFilter = document.getElementById('searchTitle').value.toLowerCase();
            const composerFilter = document.getElementById('filterComposer').value.toLowerCase();
            const instrumentFilter = document.getElementById('filterInstrument').value.toLowerCase();

            const rows = document.querySelectorAll('.scoreRow');
            rows.forEach(row => {
                const title = row.querySelector('td:first-child').textContent.toLowerCase();
                const composer = row.getAttribute('data-composer').toLowerCase();
                const instruments = row.getAttribute('data-instruments').toLowerCase();

                const matchesTitle = title.includes(titleFilter);
                const matchesComposer = composer.includes(composerFilter);
                const matchesInstrument = instruments.includes(instrumentFilter);

                if (matchesTitle && matchesComposer && matchesInstrument) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
