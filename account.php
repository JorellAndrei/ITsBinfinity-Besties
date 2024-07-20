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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $bio = isset($_POST['bio']) ? $_POST['bio'] : '';

    // Initialize file URLs
    $profile_image_url = $data['profile_image_url'];
    $cover_image_url = $data['cover_page_url'];

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $profile_image_name = basename($_FILES['profile_image']['name']);
        $profile_image_path = 'profile_images/' . $profile_image_name;
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $profile_image_path)) {
            $profile_image_url = $profile_image_path;
        } else {
            echo "Error uploading profile image.";
        }
    }

    // Handle cover image upload
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == UPLOAD_ERR_OK) {
        $cover_image_name = basename($_FILES['cover_image']['name']);
        $cover_image_path = 'cover_images/' . $cover_image_name;
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image_path)) {
            $cover_image_url = $cover_image_path;
        } else {
            echo "Error uploading cover image.";
        }
    }

    // Check if the new email is already in use by another user
    $sql_check_email = "SELECT COUNT(*) AS count FROM usersitsbinfinity WHERE email = ? AND id != ?";
    $stmt_check_email = $connection->prepare($sql_check_email);
    $stmt_check_email->bind_param("si", $email, $user_id);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();
    $row = $result_check_email->fetch_assoc();
    $stmt_check_email->close();

    if ($row['count'] > 0) {
        echo "Email is already in use by another user.";
        exit;
    }

    // Prepare update statement
    $sql_update = "UPDATE usersitsbinfinity SET username=?, email=?, age=?, gender=?, birthdate=?, location=?, bio=?, profile_image_url=?, cover_page_url=? WHERE id=?";
    $stmt_update = $connection->prepare($sql_update);
    $stmt_update->bind_param("sssisssiii", 
        $username,
        $email,
        $age,
        $gender,
        $birthdate,
        $location,
        $bio,
        $profile_image_url,
        $cover_image_url,
        $user_id
    );

    // Execute the query
    if ($stmt_update->execute()) {
        echo "Profile updated successfully.";
        header("Location: account.php"); // Redirect to profile page or another appropriate page
        exit;
    } else {
        echo "Error updating profile: " . $stmt_update->error;
    }

    $stmt_update->close();
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT's Binfinity - Portfolio</title>

    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">

    <!--styles-->
    <link rel="stylesheet" href="./assets/CSS/styles.css">
    <link rel="stylesheet" href="./assets/CSS/account.css">


    <?php include './assets/PHP/Include/config.inc.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style>
    /* General button styling */
.btn-save {
    background-color: #4CAF50; /* Green background */
    border: none; /* Remove default border */
    color: white; /* White text color */
    padding: 10px 20px; /* Add padding */
    text-align: center; /* Center text */
    text-decoration: none; /* Remove underline from text */
    display: inline-block; /* Inline block for proper alignment */
    font-size: 16px; /* Font size */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Change cursor to pointer */
    transition: background-color 0.3s, transform 0.2s; /* Smooth transitions */
}

/* Hover effect */
.btn-save:hover {
    background-color: #45a049; /* Darker green */
}

/* Active effect */
.btn-save:active {
    background-color: #388e3c; /* Even darker green */
    transform: scale(0.98); /* Slightly shrink button */
}

/* Disabled state */
.btn-save:disabled {
    background-color: #ccc; /* Light gray background */
    color: #666; /* Darker gray text */
    cursor: not-allowed; /* Change cursor to not-allowed */
}

    /* Modal Styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 1% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .profile-img-container {
        position: relative;
        width: 100%;
        height: 100px;
        background-image: url('<?php echo htmlspecialchars($data['cover_page_url'] ?? 'default-cover.jpg'); ?>');
        background-size: cover;
        background-position: center;
        background-color: #007bff;
    }

    .profile-img-container .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: white;
        position: absolute;
        bottom: -60px;
        left: 20px;
        overflow: hidden;
        border: 5px solid #fff;
    }

    .profile-img-container .profile-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-img-container .edit-btn {
        position: absolute;
        bottom: -10px;
        left: 150px;
        background: #388e3c;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #editProfileForm {
        margin-left: 100px;
        margin-right: 100px;
    }

    .preview-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .dmodal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .dmodal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }

        .dclose {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .dclose:hover,
        .dclose:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
</style>

<body style="font-family:Montserrat">

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

    <div class="wrapper">
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="profile-card js-profile-card">
        
    <div style="background: url('<?php echo htmlspecialchars($data['cover_page_url']); ?>') no-repeat center center/cover; height: 100%;">
        <!-- USER PROFILE IMAGE -->
        <div class="profile-card__img">
            <img src="<?php echo htmlspecialchars($data['profile_image_url']); ?>" alt="profile card">
        </div>
    </div>


        <div class="profile-card__cnt js-profile-cnt">
            <div class="profile-card__name" style="margin-top: 1em;margin-left: 150px; margin-right: 150px; font-size:4.5rem;">
                @<?php echo htmlspecialchars($data['username']); ?>
            </div>

            <!-- USER BIO -->
            <div class="profile-card__txt">
                <?php echo htmlspecialchars($data['email']); ?>
            </div>

            <!-- USER LOCATION -->
            <div class="profile-card-loc">
                <span class="profile-card-loc__icon">
            <img class="icon" src="./assets/Images/elements/black star.png"></img>
          </span>
                <span class="profile-card-loc__txt">
                <?php echo htmlspecialchars($data['bio']); ?>
          </span>
            </div>

            <div class="profile-card-inf">
                <div class="profile-card-inf__item">
                    <!-- USER AGE -->
                    <div class="profile-card-inf__title">
                        <?php echo htmlspecialchars($data['age']); ?>
                    </div>
                    <div class="profile-card-inf__txt">Age</div>
                </div>

                <div class="profile-card-inf__item">
                    <!-- USER GENDER -->
                    <div class="profile-card-inf__title">
                        <?php echo htmlspecialchars($data['location']); ?>
                    </div>
                    <div class="profile-card-inf__txt">Location</div>
                </div>

                <div class="profile-card-inf__item">
                    <!-- USER BIRTHDATE -->
                    <div class="profile-card-inf__title">
                        <?php echo htmlspecialchars($data['birthdate']); ?>
                    </div>
                    <div class="profile-card-inf__txt">Birthdate</div>
                </div>
            </div>

            <div class="profile-card-social">
            
                <!-- EDIT PROFILE -->
                <button href="" class="profile-card-social__item github" onclick="openEditDialog()">
                    <span class="icon-font">
                        <img class="icon" src="./assets/Images/edit.png"/>
                    </span> 
                </button>

                <!-- DELETE PROFILE -->
                <!-- Button to trigger the dialog -->
            <a href="#" id="delete-button" class="profile-card-social__item link">
                <span class="icon-font">
                    <img class="icon" src="./assets/Images/recycle-bin.png"/>
                </span>
            </a>

            <!-- Modal Dialog -->
            <div id="delete-dialog" class="dmodal">
                <div class="dmodal-content">
                    <span class="dclose">&times;</span>
                    <h2>Confirm Deletion</h2>
                    <p>Are you sure you want to delete your account?</p>
                    <form id="delete-form" method="POST" action="delete_account.php">
                        <label for="password">Enter your password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit">Confirm</button>
                        <button type="button" id="cancel-button">Cancel</button>
                    </form>
                </div>
            </div>

            </div>

            <div class="profile-card-ctr">
                <a class="profile-card__button button--green js-message-btn" id="logoutBtn">Log Out</a>
            </div>
        </div>

    </div>

</div>


    <!-- Full Cover Modal -->
    <!-- Modal -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeEditDialog()">&times;</span>
            <h2 style="color: #6bab78; font-size: 3.5rem; z-index: 999;" class="inline-block text-deep-purple-accent-400" >Edit Profile</h2>
            <div class="profile-img-container">
                <div class="profile-img">
                    <img id="profileImagePreview" src="<?php echo htmlspecialchars($data['profile_image_url']);?>" alt="Profile Image">
                </div>
                <!-- change profile image -->
                <button class="edit-btn" onclick="document.getElementById('profileImageInput').click();">
                    <i class="fa fa-pencil"></i>
                </button>
            </div>
            <!-- change cover image -->
            <button style="color: #388e3c;" class="edit-btn" onclick="document.getElementById('coverImageInput').click();">
                <i class="fa fa-pencil"></i>
            </button>
            <br><br><br>
            <form id="editProfileForm" action="update_profile.php" method="post" enctype="multipart/form-data">
            <input type="file" id="profileImageInput" name="profile_image" style="display:none;" />
            <input type="file" id="coverImageInput" name="cover_image" style="display:none;" />
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required placeholder="Enter Your Username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required placeholder="Enter Your Email">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($data['age']); ?>" min="1" placeholder="Enter Your Age">
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($data['birthdate']); ?>">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($data['location']); ?>" placeholder="Enter Location (Manila)">
            </div>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" placeholder="Enter Your Bio"><?php echo htmlspecialchars($data['bio']); ?></textarea>
            </div>
            <button type="submit" class="btn-save">Save Changes</button>
        </form>
        </div>
    </div>

    <script src="./assets/JS/script.js"></script>

    <script>
        function setDateRange() {
        const today = new Date();
        const minDate = new Date(today.getFullYear() - 100, 0, 1).toISOString().split('T')[0]; // 150 years ago
        const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate()).toISOString().split('T')[0]; // 18 years ago

        const birthdateInput = document.getElementById('birthdate');
        birthdateInput.setAttribute('min', minDate);
        birthdateInput.setAttribute('max', maxDate);
    }

    setDateRange();
        document.getElementById("logoutBtn").addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert("User logged out successfully!");
                    window.location.href = "login.php";
                } else {
                    alert("Error logging out. Please try again.");
                }
            };
            xhr.send();
        });

        // EDIT PROFILE MODAL
        
        // Open modal function
        function openEditDialog() {
            document.getElementById('editProfileModal').style.display = 'block';
            document.body.classList.add('modal-open');
        }

        function closeEditDialog() {
            document.getElementById('editProfileModal').style.display = 'none';
            document.body.classList.remove('modal-open');
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('editProfileModal')) {
                closeEditDialog();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById("delete-dialog");
        var btn = document.getElementById("delete-button");
        var span = document.getElementsByClassName("close")[0];
        var cancelBtn = document.getElementById("cancel-button");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        cancelBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

        // Handle image previews
        document.getElementById('profileImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profileImagePreview').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('coverImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.querySelector('.profile-img-container').style.backgroundImage = `url(${event.target.result})`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
