<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Connect to the database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all data from a table (e.g., 'your_table_name')
$sql = "SELECT * FROM usersitsbinfinity";
$result = $connection->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$connection->close();
?>

<!-- Output data to HTML -->
<?php foreach ($data as $row): ?>
    <div class="data-item">
        <h2><?php echo htmlspecialchars($row['column_name']); ?></h2>
        <p><?php echo htmlspecialchars($row['another_column']); ?></p>
        <!-- Add more fields as needed -->
    </div>
<?php endforeach; ?>
