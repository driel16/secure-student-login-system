<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">

    <input type="text"
           name="username"
           placeholder="Enter username"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Enter password"
           required>

    <br><br>

    <button type="submit">Register</button>

</form>
