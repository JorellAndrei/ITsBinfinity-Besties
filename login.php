<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Start session
session_start();

// Check if the user is already logged in, if yes then redirect them to the welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM usersitsbinfinity WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Update user status to "active"
                            $update_sql = "UPDATE usersitsbinfinity SET status = 'active' WHERE id = ?";
                            $update_stmt = mysqli_prepare($link, $update_sql);
                            mysqli_stmt_bind_param($update_stmt, "i", $id);
                            mysqli_stmt_execute($update_stmt);
                            mysqli_stmt_close($update_stmt);
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                            exit();
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
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
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./assets/CSS/login.css">
</head>

<body>
    <!--ring div starts here-->
    <div class="ring">
        <i style="--clr:#00ff0a;"></i>
        <i style="--clr:#ff0057;"></i>
        <i style="--clr:#fffd44;"></i>
        <div class="login">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="inputBx">
                    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
                    <span><?php echo $username_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <span><?php echo $password_err; ?></span>
                </div>
                <div class="inputBx">
                    <input type="submit" id="login" value="Log in">
                </div>
                <p style="color: red;"><?php echo $login_err; ?></p>
            </form>

            <center>
            <div class="links">
                <a href="signup.php" style="font-weight: 900; text-decoration:underline; margin-right: 2rem;">Signup</a>
                <a href="resetpassword.php" style="font-weight: 900; text-decoration:underline;">Forgot Password?</a>
            </div>
            </center>
        </div>
    </div>
    <!--ring div ends here-->

    <script>
        history.pushState(null, document.title, location.href);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, document.title, location.href);
        });

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
    </script>
</body>

</html>
