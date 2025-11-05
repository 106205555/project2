<?php
require_once("settings.php");

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
if(empty($_POST['firstname'])) {
    $missings[] = "First name";
} else {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
}

if(empty($_POST['lastname'])) {
    $missings[] = "Last name";
} else {
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
}

if(empty($_POST['street'])) {
    $missings[] = "Street address";
} else {
    $street = mysqli_real_escape_string($conn, $_POST['street']);
}

if(empty($_POST['town'])) {
    $missings[] = "Suburb/town";
} else {
    $town = mysqli_real_escape_string($conn, $_POST['town']);
}

if(empty($_POST['state'])) {
    $missings[] = "State";
} else {
    $state = mysqli_real_escape_string($conn, $_POST['state']);
}

if(empty($_POST['postcode'])) {
    $missings[] = "Postcode";
} else {
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
}

if(empty($_POST['email'])) {
    $missings[] = "Email address";
} else {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
}

if(empty($_POST['phone'])) {
    $missings[] = "Phone number";
} else {
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
}

if(empty($_POST['jobrefnum'])) {
    $missings[] = "Job reference number";
} else {
    $jobrefnum = mysqli_real_escape_string($conn, $_POST['jobrefnum']);
}

if(empty($_POST['prglang'])) {
    $missings[] = "Programming languages";
} else {
    $prglang = mysqli_real_escape_string($conn, $_POST['prglang']);
}

// Checks for errors and inserts data into table
if(empty($missings) && empty($errors)) {
    echo "<p>Thank you!</p>";
} elseif(isset($missing)) {
    echo "<p>Please fill in all the required fields.</p> <p>Missing fields:</p>";
    foreach($missings as $missing) {
        echo "<p>" .$missing. "</p>";
    }
} else {
    echo "<p><strong>Error:</strong></p>";
    foreach($errors as $error) {
        echo "<p>" .$error. "</p>";
    }
}
?>
