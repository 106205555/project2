<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Apply</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/eoi.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
    <?php
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

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
                programming_lang VARCHAR(50),
                otherskills VARCHAR(100),
                status VARCHAR(7)
                )";
            $eoicreate = mysqli_query($conn, $eoiquery2);
        }

        // Extracts and sanitizes data received from form
        $firstname = clean_input($conn, $_POST["firstname"]);
        $lastname = clean_input($conn, $_POST["lastname"]);
        $dob = clean_input($conn, $_POST["dob"]);
        if(isset($_POST["gender"])) {
            $gender = clean_input($conn, $_POST["gender"]);
        }
        $street = clean_input($conn, $_POST["street"]);
        $town = clean_input($conn, $_POST["town"]);
        $state = clean_input($conn, $_POST["state"]);
        $postcode = clean_input($conn, $_POST["postcode"]);
        $email = clean_input($conn, $_POST["email"]);
        $phone = clean_input($conn, $_POST["phone"]);
        $jobrefnum = clean_input($conn, $_POST["jobrefnum"]);
        if(isset($_POST["prglang"]) && is_array($_POST["prglang"])) {
            $cleaned_langs = array();
            foreach($_POST["prglang"] as $lang) {
                $cleaned_langs[] = clean_input($conn, $lang);
            }
            $prglang = implode(", ", $cleaned_langs);
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

        if(empty($dob)) {
            $missings[] = "Date of birth";
        }

        if(empty($gender)) {
            $missings[] = "Gender";
        }

        if(empty($street)) {
            $missings[] = "Street address";
        } elseif(strlen($street) > 40) {
            $errors[] = "Street address: Must not exceed 40 characters.";
        }

        if(empty($town)) {
            $missings[] = "Suburb/town";
        } elseif(strlen($town) > 40) {
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
        } elseif(!preg_match("/^[\d\s]{8,12}$/", $phone)) {
            $errors[] = "Phone number: Must contain 8 to 12 digits, or spaces.";
        }

        if(empty($jobrefnum)) {
            $missings[] = "Job reference number";
        }

        if(empty($prglang)) {
            $missings[] = "Programming languages";
        }

        if(strlen($otherskills) > 100) {
            $errors[] = "Other skills: Must not exceed 100 characters.";
        }

        // Checks for errors and inserts data into table
        if(empty($missings) && empty($errors)) {
            $eoiquery3 = "
                INSERT INTO eoi (job_id, first_name, last_name, street, town, state, postcode, email, phone, programming_lang, otherskills, status)
                VALUES ('".$jobrefnum."', '".$firstname."', '".$lastname."', '".$street."', '".$town."', '".$state."', '".$postcode."', '".$email."', '".$phone."', '".$prglang."', '".$otherskills."', 'New')";
            $eoiinsert = mysqli_query($conn, $eoiquery3);
            echo '
            <div class="submission-container">
                <div class="success-card">
                    <div class="success-icon">
                        <svg width="80" height="80" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" fill="#4CAF50" opacity="0.2"/>
                            <path d="M30 50 L45 65 L70 35" stroke="#4CAF50" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    
                    <h1>Submission Complete</h1>
                    <p class="subtitle">Thank you for your submission! You can check your details below:</p>
                    
                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="label">First name</span>
                            <span class="value">'.$firstname.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Last name</span>
                            <span class="value">'.$lastname.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Date of birth</span>
                            <span class="value">'.$dob.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Gender</span>
                            <span class="value">'.$gender.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Street address</span>
                            <span class="value">'.$street.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Suburb/town</span>
                            <span class="value">'.$town.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">State</span>
                            <span class="value">'.$state.' (Postcode: '.$postcode.')</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Email address</span>
                            <span class="value">'.$email.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Phone number</span>
                            <span class="value">'.$phone.'</span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="label">Job reference number</span>
                            <span class="value">'.$jobrefnum.'</span>
                        </div>
                        
                        <div class="detail-item full-width">
                            <span class="label">Programming language(s)</span>
                            <span class="value">'.$prglang.'</span>
                        </div>
                        
                        <div class="detail-item full-width">
                            <span class="label">Other skill(s)</span>
                            <span class="value">'.($otherskills ? $otherskills : 'None').'</span>
                        </div>
                    </div>
                    
                    <div class="button">
                        <a href="apply.php" class="btn">Return to Form</a>
                    </div>
                </div>
            </div>';

        } elseif(isset($missings)) {
            // Missing fields
            echo 
            '<div class="error-container">
                <div class="error-icon">
                    <svg width="80" height="80" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="45" fill="#e74c3c" opacity="0.2"/>
                        <path d="M35 35 L65 65 M65 35 L35 65" stroke="#e74c3c" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h2>Missing Required Fields</h2>
                <p>Please fill in all required fields:</p>
                <ul class="error-list">';
        foreach($missings as $missing) {
            echo 
            '<li>'.$missing.'</li>';
        }
            echo 
                '</ul>
                <div class="button">
                    <a href="apply.php" class="btn">Return to Form</a>
                </div>
            </div>';

        } else {
            // Validation errors
            echo 
            '<div class="error-container">
                <div class="error-icon">
                    <svg width="80" height="80" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="45" fill="#e74c3c" opacity="0.2"/>
                        <path d="M35 35 L65 65 M65 35 L35 65" stroke="#e74c3c" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h2>Validation Errors</h2>
                <p>Please check the following field(s) again:</p>
                <ul class="error-list">';
        foreach($errors as $error) {
            echo 
            '<li>'.$error.'</li>';
        }   
            echo 
                '</ul>
                <div class="button">
                    <a href="apply.php" class="btn">Return to Form</a>
                </div>
            </div>';
        }

        mysqli_close($conn);
    } else {
        header('Location: apply.php');
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
