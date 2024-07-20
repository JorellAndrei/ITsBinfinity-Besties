<?php
// Include config file
require_once "./assets/PHP/Database/config.php";

// Define default profile image URL
$default_profile_image_url = 'https://i.pinimg.com/originals/9c/6a/42/9c6a424f48be711cbd85d7274b18ce86.jpg';

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM usersitsbinfinity WHERE username = ?";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        // Prepare a select statement for email
        $sql = "SELECT id FROM usersitsbinfinity WHERE email = ?";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO usersitsbinfinity (username, email, password, profile_image_url) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_password, $param_profile_image_url);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_profile_image_url = $default_profile_image_url; // Set default profile image URL

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: home.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="./assets/CSS/signup.css">
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
</head>

<body>
    <!--ring div starts here-->
    <div class="ring">
        <i style="--clr:#00ff0a;"></i>
        <i style="--clr:#ff0057;"></i>
        <i style="--clr:#fffd44;"></i>
        <div class="login">
            <h2>Signup</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="inputBx">
                    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>">
                    <span><?php echo $username_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $email; ?>">
                    <span><?php echo $email_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <span><?php echo $password_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <span><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="submit" id="signup" value="Sign up">
                </div>
            </form>

            <p id="text_show" style="color: #245441; font-size: 12px; "></p>
            <div class="links" style="color: #245441;">
                <a href="#">Already have an account?</a>
                <a href="./login.php" style="font-weight: 900; text-decoration:underline;">Login</a>
            </div>
        </div>
    </div>
    <!--ring div ends here-->

    <script>
        window.onload = function() {
            window.history.replaceState(null, null, window.location.href);
        };

        // Disable back navigation after logout
        window.addEventListener('popstate', function() {
            window.history.pushState(null, null, window.location.href);
        });

        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.go(1);
        };

        history.pushState(null, document.title, location.href);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, document.title, location.href);
        });

        window.onload = function() {
            // Retrieve username from local storage
            const username = localStorage.getItem('username');

            // Display username in profile card
            const profileCardName = document.querySelector('.profile-card__name');
            if (username) {
                profileCardName.textContent = username;
            } else {
                profileCardName.textContent = "Guest";
            }
        };
    </script>
</body>

</html>
