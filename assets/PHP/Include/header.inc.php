<?php
// Include database configuration file
include './assets/PHP/Database/config.php';
// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Connect to the database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get user ID from session
$user_id = $_SESSION["id"];

// Fetch user data based on session user ID
$sql = "SELECT * FROM usersitsbinfinity WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "No results found.";
    exit;
}
$stmt->close();
// Close connection
$connection->close();
?>

<div id="nav-bar" style="z-index: 999;">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header">
        <a id="nav-title" href="https://drive.google.com/file/d/1Qskt0yT_P-fnrO6xYQvqhL7MG5HGZ-Dj/view?usp=sharing" target="_blank">
            ITs<i class="fab fa-bin"></i> Binfinity
        </a>
        <label for="nav-toggle">
            <span id="nav-toggle-burger"></span>
        </label>
        <hr/>
    </div>

    <div id="nav-content">
        <div class="nav-button current tooltip-container" data-url="./home.php">
            <i class="fas fa-home"></i>
            <span id="home">HOME</span>
        </div>
        <div class="nav-button" data-url="./about.php">
            <i class="fas fa-trash"></i>
            <span>ABOUT</span>
        </div>
        <div class="nav-button" data-url="./features.php">
            <i class="fas fa-mobile"></i>
            <span>GALLERY</span>
        </div>
        <hr/>
        <div class="nav-button" data-url="./account.php">
            <i class="fas fa-folder"></i>
            <span>ACCOUNT</span>
        </div>
        <div class="nav-button" data-url="./team.php">
            <i class="fas fa-fire"></i>
            <span>TEAM</span>
        </div>
        <div class="nav-button" data-url="./contact.php">
            <i class="fas fa-magic"></i>
            <span>CONTACT</span>
        </div>
        <hr/>
        <div class="nav-button" data-url="./simulation.php">
            <i class="fas fa-code"></i>
            <span>SAMPLE GAME</span>
        </div>
        <div id="nav-content-highlight"></div>
    </div>

    <input id="nav-footer-toggle" type="checkbox" />
    <div id="nav-footer">
        <div id="nav-footer-heading">
            <div id="nav-footer-avatar">
                <img src="<?php echo htmlspecialchars($data['profile_image_url']); ?>" alt="">
            </div>
            <div id="nav-footer-titlebox">
                <a id="nav-footer-title" href="#1stsec"><?php echo htmlspecialchars($data['username']); ?></a>
                <span id="nav-footer-subtitle"><?php echo htmlspecialchars($data['email']); ?></span>
            </div>
            <label for="nav-footer-toggle">
                <i class="fas fa-caret-up"></i>
            </label>
        </div>
        <div id="nav-footer-content">
            <p>
            <?php echo htmlspecialchars($data['bio']); ?>
            </p>
        </div>
    </div>
</div>
