<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Form Submission</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
    <?php
    require_once("settings.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Checks if there is a table named 'eoi'. If not, creates one.
        $eoiquery1 = "SHOW TABLES LIKE 'eoi'";
        $eoicheck = mysqli_query($conn, $eoiquery1);
        if(mysqli_num_rows($eoicheck) == 0) {
            $eoiquery2 = "CREATE TABLE eoi (
                eoi_id INT AUTO_INCREMENT PRIMARY KEY,
                job_id VARCHAR(5),
                first_name VARCHAR(20),
                last_name VARCHAR(20),
                street VARCHAR(40),
                town VARCHAR(40),
                state VARCHAR(3),
                postcode INT,
                email VARCHAR(50),
                phone VARCHAR(12),
                programming_lang VARCHAR(6),
                otherskills VARCHAR(100),
                status VARCHAR(7)
                )";
            $eoicreate = mysqli_query($conn, $eoiquery2);
        }

        // Extracts and sanitizes data received from form
        $firstname = clean_input($conn, $_POST["firstname"]);
        $lastname = clean_input($conn, $_POST["lastname"]);
        $street = clean_input($conn, $_POST["street"]);
        $town = clean_input($conn, $_POST["town"]);
        $state = clean_input($conn, $_POST["state"]);
        $postcode = clean_input($conn, $_POST["postcode"]);
        $email = clean_input($conn, $_POST["email"]);
        $phone = clean_input($conn, $_POST["phone"]);
        $jobrefnum = clean_input($conn, $_POST["jobrefnum"]);
        if(isset($prglang)) {
            $prglang = clean_input($conn, $_POST["prglang"]);
        }
        $otherskills = clean_input($conn, $_POST["otherskills"]);

        // Validates data
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

        if(empty($street)) {
            $missings[] = "Street address";
        } elseif(strlen($street) > 40) {
            $errors[] = "Street address: Must not exceed 40 characters.";
        }

        if(empty($town)) {
            $missings[] = "Suburb/town";
        } elseif(strlen($street) > 40) {
            $errors[] = "Suburb/town: Must not exceed 40 characters.";
        }

        if(empty($state)) {
            $missings[] = "State";
        }

        if(empty($postcode)) {
            $missings[] = "Postcode";
        } elseif(!preg_match("/^\d{4}$/", $postcode)) {
            $errors[] = "Postcode: Must be exactly 4 digits.";
        }

        if(empty($email)) {
            $missings[] = "Email address";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email address: Invalid format.";
        }

        if(empty($phone)) {
            $missings[] = "Phone number";
        } elseif(!preg_match("/^[A-Za-z]{1,20}$/", $phone)) {
            $errors[] = "Phone number: Must contain 8 to 12 digits, or spaces.";
        }

        if(empty($jobrefnum)) {
            $missings[] = "Job reference number";
        }

        if(empty($prglang)) {
            $missings[] = "Programming languages";
        }

        // Checks for errors and inserts data into table
        if(empty($missings) && empty($errors)) {
            echo "<p>Please confirm your details:</p>";
            echo "<ul>";
            echo "<li>First name: ".$firstname."</li>";
            echo "<li>Last name: ".$lastname."</li>";
            echo "<li>Street address: ".$street."</li>";
            echo "<li>Suburb/town: ".$town."</li>";
            echo "<li>State: ".$state." (Postcode: ".$postcode.")</li>";
            echo "<li>Email address: ".$email."</li>";
            echo "<li>Phone number: ".$phone."</li>";
            echo "<li>Job reference number: ".$jobrefnum."</li>";
            echo "<li>Programming language(s): ".$prglang."</li>";
            echo "</ul>";
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
        header('Location: index.php');
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
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
