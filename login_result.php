<?php
session_start();
require_once("settings.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user input
    $username = clean_input($conn, $_POST['username']);
    $password = trim($_POST['password']);

    // Simple query to check credentials
    $query = "SELECT * FROM user_data WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
    } else {
        header("Location: login.php?error=invalid");
    }

    mysqli_close($conn);
} else {
    header('Location: login.php');
}

// Data sanitation function
function clean_input($conn, $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
?>
