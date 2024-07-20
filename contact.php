<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Start session
session_start();

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
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT's Binfinity - Contact</title>

    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <!--styles-->
    <link rel="stylesheet" href="./assets/CSS/styles.css">
    <link rel="stylesheet" href="./assets/CSS/contact.css">

    <!--scripts-->
    <script src="./assets/JS/script.js"></script>

    <?php include './assets/PHP/Include/config.inc.php'; ?>

</head>

<body>

    <!------------------- NAVBAR  -------------------------->
    <div id="nav-bar" style="z-index: 2;">
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
</div>
    <!------------------- END NAVBAR  -------------------------->

    <!------------------- START CONTACT  ----------------------->

    <div class="container">
        <span class="big-circle"></span>
        <img src="./assets/Images/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title" style="font-size: 3rem; font-weight: 700; text-align:center;">Let's get in touch</h3>
                <p class="text">
                    Looking to join the movement towards sustainable living? <br><br>Connect with us today and embark on an adventure with IT's Binfinity!
                </p>

                <div class="info">
                    <div class="information">
                        <img src="./assets/Images/location.png" class="icon" alt="" />
                        <p>Manila, Philippines</p>
                    </div>
                    <div class="information">
                        <img src="./assets/Images/email.png" class="icon" alt="" />
                        <p>itsbinfinity@gmail.com</p>
                    </div>
                    <div class="information">
                        <img src="./assets/Images/phone.png" class="icon" alt="" />
                        <p>09052256312</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="handle_contact_form.php" method="POST">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input  style="filter:brightness(70%);" type="text" name="name" class="input" required value="<?php echo htmlspecialchars($data['username']); ?>" readonly/>
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" value="<?php echo htmlspecialchars($data['email']); ?>" required/>
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" required/>
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input" required></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <!------------------- END CONTACT  ------------------------->


    <script src="./assets/JS/script.js"></script>
    <script>
        feather.replace()

        document.addEventListener('DOMContentLoaded', function() {
            // Get all nav buttons
            const navButtons = document.querySelectorAll('.nav-button');

            // Add click event listener to each nav button
            navButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the URL from the data-url attribute of the button
                    const url = this.dataset.url;

                    // Navigate to the URL
                    window.location.href = url;
                });
            });
        });

        const inputs = document.querySelectorAll(".input");

        function focusFunc() {
            let parent = this.parentNode;
            parent.classList.add("focus");
        }

        function blurFunc() {
            let parent = this.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach((input) => {
            input.addEventListener("focus", focusFunc);
            input.addEventListener("blur", blurFunc);
        });

        const contactForm = document.querySelector('.contact-form form');

        contactForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            const formData = new FormData(contactForm);

            // Create an AJAX request
            fetch('./handle_contact_form.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Handle the response from the server
                console.log("Server response:", data); // For debugging purposes
                
                if (data.trim() === 'Message sent successfully!') {
                    alert('Message sent successfully!'); // Notify the user
                    contactForm.reset(); // Clear the form fields
                } else {
                    alert('Failed to send message. Please try again.'); // Notify the user
                }
            })
            .catch(error => {
                console.error('Error:', error); // Log any errors
                alert('An error occurred. Please try again.'); // Notify the user
            });
        });

    </script>

</body>

</html>