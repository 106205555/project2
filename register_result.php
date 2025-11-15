<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Register</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <?php
        session_start();
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitizes user input
            $username = clean_input($conn, $_POST["username"]);
            $password = $_POST["password"];
            $firstname = clean_input($conn, $_POST["firstname"]);
            $lastname = clean_input($conn, $_POST["lastname"]);
            $dob = clean_input($conn, $_POST["dob"]);
            if(isset($_POST["gender"])) {
                $gender = clean_input($conn, $_POST["gender"]);
            }
            $email = clean_input($conn, $_POST["email"]);

            // Validates data
            $query = "SELECT * FROM user_data WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            if(empty($username)) {
                $missings[] = "Username";
            } elseif(strlen($username) > 20 || strlen($username) < 8) {
                $errors[] = "Username: Must be between 8-20 characters long.";
            } elseif(mysqli_num_rows($result) > 0) {
                $errors[] = "Username: Already taken. Please <a href='login.php'>log in</a> or use a different username.";
            }

            if(empty($password)) {
                $missings[] = "Password";
            } elseif(strlen($password) > 20 || strlen($password) < 8) {
                $errors[] = "Password: Must be between 8-20 characters long.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            }

            if(empty($firstname)) {
                $missings[] = "First name";
            } elseif(!preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
                $errors[] = "First name: Must not exceed 20 alpha characters.";
            }

            if(empty($lastname)) {
                $missings[] = "Last name";
            } elseif(!preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
                $errors[] = "Last name: Must not exceed 20 alpha characters.";
            }

            if(empty($dob)) {
                $missings[] = "Date of birth";
            }

            if(empty($email)) {
                $missings[] = "Email address";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email address: Invalid format.";
            }

            // Checks for errors and inserts data into table
            if(empty($missings) && empty($errors)) {
                $stmt = $conn->prepare("INSERT INTO user_data (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashed_password);
                $stmt->execute();
                echo "<h1>Registration Complete</h1>";
                echo "<p>Thank you for your registration!</p>";

            } elseif(isset($missings)) {
                echo "<p>Please fill in all required fields:</p>";
                echo "<p>Missing required field(s):</p>";
                echo "<ul>";
                foreach($missings as $missing) {
                    echo "<li>".$missing."</li>";
                }
                echo "</ul>";

            } else {
                echo "<p><strong>Error</strong></p>";
                echo "<p>Please check the following field(s) again:</p>";
                echo "<ul>";
                foreach($errors as $error) {
                    echo "<li>".$error."</li>";
                }
                echo "</ul>";
            }
        } else {
            header("Location: register.php");
        }

        // Data sanitation function
        function clean_input($conn, $data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = mysqli_real_escape_string($conn, $data);
            return $data;
        }

        mysqli_close($conn);
        ?>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
