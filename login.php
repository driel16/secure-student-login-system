<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            echo "LOGIN SUCCESS!";

        } else {

            echo "Wrong password!";

        }

    } else {

        echo "User not found!";

    }
}
?>

<form method="POST">

    <input type="text"
           name="username"
           placeholder="Username"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password"
           required>

    <br><br>

    <button type="submit">Login</button>

</form>
