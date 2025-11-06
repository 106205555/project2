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

    // Extracts and validates data received from form
    $firstname = clean_input($conn, $_POST["firstname"]);
    $lastname = clean_input($conn, $_POST["lastname"]);
    $street = clean_input($conn, $_POST["street"]);
    $town = clean_input($conn, $_POST["town"]);
    $state = clean_input($conn, $_POST["state"]);
    $postcode = clean_input($conn, $_POST["postcode"]);
    $email = clean_input($conn, $_POST["email"]);
    $phone = clean_input($conn, $_POST["phone"]);
    $jobrefnum = clean_input($conn, $_POST["jobrefnum"]);
    $prglang = clean_input($conn, $_POST["prglang"]);
    $otherskills = clean_input($conn, $_POST["otherskills"]);

    if(empty($firstname)) {
        $missings[] = "First name";
    }

    if(empty($lastname)) {
        $missings[] = "Last name";
    }

    if(empty($street)) {
        $missings[] = "Street address";
    }

    if(empty($town)) {
        $missings[] = "Suburb/town";
    }

    if(empty($state)) {
        $missings[] = "State";
    }

    if(empty($postcode)) {
        $missings[] = "Postcode";
    }

    if(empty($email)) {
        $missings[] = "Email address";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if(empty($phone)) {
        $missings[] = "Phone number";
    }

    if(empty($jobrefnum)) {
        $missings[] = "Job reference number";
    }

    if(empty($prglang)) {
        $missings[] = "Programming languages";
    }

    // Checks for errors and inserts data into table
    
}

// Checks integrity of data
function clean_input($conn, $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
?>
