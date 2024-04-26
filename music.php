<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Define the song data
$songs = array(
    array("title" => "Cruel Summer", "artist" => "Taylor Swift", "instruments" => "Flute, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Trombone, Bariton, Sousaphone, Snare drum, Tenor drums, Bass drums."),
    array("title" => "Fast Car", "artist" => "Luke Combs", "instruments" => "Flute, Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Trombone, Baritone, Sousaphone, Snare drum, Tenor drum, Bass drum."),
    array("title" => "Feeling Good", "artist" => "Michael Buble", "instruments" => "Trumpet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trombone, Bass trombone, Electric guitar, Piano, Contrabass."),
    array("title" => "GDFR", "artist" => "Flo Rida", "instruments" => "Piccolo, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Horn, Trombone, Tuba, Drumset, Stamp."),
    array("title" => "I Ain't Worried", "artist" => "OneRepublic", "instruments" => "Piccolo, Flute, Clarinet, Bass clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Mellophone, Horn in F, Trombone, Baritone, Tuba, Sousaphone, Glockenspiel, Xylophone."),
    array("title" => "Kung Fu Fighting", "artist" => "Carl Douglas", "instruments" => "Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Bass trombone, Drumset, Piano, Bass guitar."),
    array("title" => "Sing Sing Sing!", "artist" => "Benny Goodman", "instruments" => "Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Acoustic guitar, Piano, Contrabass, Drumset."),
    array("title" => "The Zamboni", "artist" => "Nicholas D", "instruments" => "Flute, Oboe, Clarinet, Alto saxophone, Tenor saxophone, Baritone saxophone, Horn, Piano, trumpet, Trombone, Tuba, Timpani, Bass drum."),
    array("title" => "Whistle", "artist" => "Flo Rida", "instruments" => "Flutes, Clarinet, Alto saxophone, Tenor saxophone, Trumpet, Mellophone, Trombone, Tuba, Piano."),
    array("title" => "You Don't Know You're Beautiful - Call Me Maybe", "artist" => "Mashup (One Direction, and Carly Rae Jepson)", "instruments" => "Drumset, C Instrument (Treble and Bass), B-Flat instrument (Treble and Bass), E-Flat instrument (Treble)."),
    array("title" => "Flowers", "artist" => "Miley Cyrus", "instruments" => "Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Electric bass, Drumset"),
    array("title" => "Dancing Queen", "artist" => "Abba", "instruments" => "Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Electric guitar, Piano"),
    array("title" => "Perfect", "artist" => "Ed Sheeran", "instruments" => "Alto saxophone, Tenor saxophone, Baritone saxophone, Trumpet, Trombone, Piano, Bass guitar, Drumset."),
    array("title" => "September", "artist" => "Earth, Wind, and Fire", "instruments" => "Soprano (Voice), Melody C (Treble, Bass), Clarinet, Alto saxophone, Tenor saxophone, Trombone, Electric guitar, Piano, Acoustic bass, Drumset."),
    array("title" => "... Ready For It?", "artist" => "Taylor Swift", "instruments" => "Piano"),
);

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($search)) {
    $filtered_songs = array_filter($songs, function ($song) use ($search) {
        return stripos($song['title'], $search) !== false || stripos($song['artist'], $search) !== false;
    });
} else {
    $filtered_songs = $songs;
}

// Filter by instrument functionality
$selected_instruments = isset($_GET['instrument']) ? $_GET['instrument'] : array();
if (!empty($selected_instruments)) {
    $filtered_songs = array_filter($filtered_songs, function ($song) use ($selected_instruments) {
        $instruments = explode(', ', $song['instruments']);
        foreach ($selected_instruments as $instrument) {
            if (in_array($instrument, $instruments)) {
                return true;
            }
        }
        return false;
    });
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
            <li>
                <p class="welcomeName">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="containerhome">
        <br><br><br><br><br><br><br><br><br><br>
        <h1 class="website-name">Bandnet</h1>

        <!-- Search form -->
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search by title or artist" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Instrument filter -->
        <form action="" method="GET">
            <label for="instrument">Filter by Instrument:</label>
            <select name="instrument[]" id="instrument" multiple>
                <option value="Flute">Flute</option>
                <option value="Clarinet">Clarinet</option>
                <option value="Bass clarinet">Bass clarinet</option>
                <option value="Alto saxophone">Alto saxophone</option>
                <option value="Tenor saxophone">Tenor saxophone</option>
                <option value="Baritone saxophone">Baritone saxophone</option>
                <option value="Trumpet">Trumpet</option>
                <option value="Mellophone">Mellophone</option>
                <option value="Trombone">Trombone</option>
                <option value="Bariton">Bariton</option>
                <option value="Sousaphone">Sousaphone</option>
                <option value="Snare drum">Snare drum</option>
                <option value="Tenor drums">Tenor drums</option>
                <option value="Bass drums">Bass drums</option>
                <option value="Horn">Horn</option>
                <option value="Drumset">Drumset</option>
                <option value="Stamp">Stamp</option>
                <option value="Horn in F">Horn in F</option>
                <option value="Glockenspiel">Glockenspiel</option>
                <option value="Xylophone">Xylophone</option>
                <option value="Electric guitar">Electric guitar</option>
                <option value="Acoustic guitar">Acoustic guitar</option>
                <option value="Piano">Piano</option>
                <option value="Contrabass">Contrabass</option>
                <option value="Bass trombone">Bass trombone</option>
                <option value="Acoustic bass">Acoustic bass</option>
                <option value="Electric bass">Electric bass</option>
                <option value="Timpani">Timpani</option>
                <option value="C Instrument (Treble and Bass)">C Instrument (Treble and Bass)</option>
                <option value="B-Flat instrument (Treble and Bass)">B-Flat instrument (Treble and Bass)</option>
                <option value="E-Flat instrument (Treble)">E-Flat instrument (Treble)</option>
                <!-- Add more instrument options here -->
            </select>
            <button type="submit">Apply Filter</button>
        </form>

        <table class="song-table">
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Instruments</th>
            </tr>

            <!-- Display filtered songs -->
            <?php foreach ($filtered_songs as $song) : ?>
                <tr>
                    <td><a href="Music/<?php echo strtolower(str_replace(' ', '', $song['title'])) . '.php'; ?>"><?php echo $song['title']; ?></a></td>
                    <td><?php echo $song['artist']; ?></td>
                    <td><?php echo $song['instruments']; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <p class="bottombuttons">
            <!-- Pagination buttons -->
        </p>
    </div>
</body>

</html>
