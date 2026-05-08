<?php
// Use the new user credentials here
$conn = new mysqli("localhost", "student_admin", "YourStrongPassword123!", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected!";
?>
