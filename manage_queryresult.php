<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Management</title>
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
            // Checks if an EOI action has been selected
            if(empty($_POST["eoiaction"])) {
                echo "<p>Please select a database action to begin.</p>";

            // Lists all EOIs
            } elseif($_POST["eoiaction"] == "listall") {
                $query1 = "SELECT * FROM eoi";
                $result1 = mysqli_query($conn, $query1);
                if (mysqli_num_rows($result1) > 0) {
                    echo "<p>Execution successful!</p>";
                    echo "<p>Here's a table of all EOIs:</p>";
                    echo "<table>";
                    echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>" . $row['eoi_id'] . "</td>";
                        echo "<td>" . $row['job_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['street'] . "</td>";
                        echo "<td>" . $row['town'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['postcode'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['programming_lang'] . "</td>";
                        echo "<td>" . $row['otherskills'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>🚫 No matching EOIs found.</p>";
                }
            
            // Lists all EOIs of same job
            } elseif($_POST["eoiaction"] == "listjob") {
                if(empty($_POST["jobrefnum1"])) {
                    echo "<p>Please select a Job Reference Number to begin search.</p>";
                } else {
                    $jobrefnum1 = clean_input($conn, $_POST["jobrefnum1"]);
                    $query2 = "SELECT * FROM eoi WHERE job_id = '".$jobrefnum1."'";
                    $result2 = mysqli_query($conn, $query2);
                    if (mysqli_num_rows($result2) > 0) {
                        echo "<p>Execution successful!</p>";
                        echo "<p>Here's a table of all EOIs associated with Job Reference Number <strong>".$jobrefnum1."</strong>:</p>";
                        echo "<table>";
                        echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<tr>";
                            echo "<td>" . $row['eoi_id'] . "</td>";
                            echo "<td>" . $row['job_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['postcode'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['programming_lang'] . "</td>";
                            echo "<td>" . $row['otherskills'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching EOIs found.</p>";
                    }
                }
            
            // Lists all EOIs of same applicant name
            } elseif($_POST["eoiaction"] == "listapplicant") {
                // Empty
                if(empty($_POST["firstname"]) && empty($_POST["lastname"])) {
                    echo "<p>Please enter an applicant's name to begin search.</p>";
                
                // First name only
                } elseif(!empty($_POST["firstname"]) && empty($_POST["lastname"])) {
                    $firstname = clean_input($conn, $_POST["firstname"]);
                    $query3 = "SELECT * FROM eoi WHERE first_name = '".$firstname."'";
                    $result3 = mysqli_query($conn, $query3);
                    if (mysqli_num_rows($result3) > 0) {
                        echo "<p>Execution successful!</p>";
                        echo "<p>Here's a table of all matching EOIs:</p>";
                        echo "<table>";
                        echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo "<tr>";
                            echo "<td>" . $row['eoi_id'] . "</td>";
                            echo "<td>" . $row['job_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['postcode'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['programming_lang'] . "</td>";
                            echo "<td>" . $row['otherskills'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching EOIs found.</p>";
                    }

                // Last name only
                } elseif(empty($_POST["firstname"]) && !empty($_POST["lastname"])) {
                    $lastname = clean_input($conn, $_POST["lastname"]);
                    $query4 = "SELECT * FROM eoi WHERE last_name = '".$lastname."'";
                    $result4 = mysqli_query($conn, $query4);
                    if (mysqli_num_rows($result4) > 0) {
                        echo "<p>Execution successful!</p>";
                        echo "<p>Here's a table of all matching EOIs:</p>";
                        echo "<table>";
                        echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                        while ($row = mysqli_fetch_assoc($result4)) {
                            echo "<tr>";
                            echo "<td>" . $row['eoi_id'] . "</td>";
                            echo "<td>" . $row['job_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['postcode'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['programming_lang'] . "</td>";
                            echo "<td>" . $row['otherskills'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching EOIs found.</p>";
                    }
                
                // Both names given
                } else {
                    $firstname = clean_input($conn, $_POST["firstname"]);
                    $lastname = clean_input($conn, $_POST["lastname"]);
                    $query5 = "SELECT * FROM eoi WHERE first_name = '".$firstname."' AND last_name = '".$lastname."'";
                    $result5 = mysqli_query($conn, $query5);
                    if (mysqli_num_rows($result5) > 0) {
                        echo "<p>Execution successful!</p>";
                        echo "<p>Here's a table of all matching EOIs:</p>";
                        echo "<table>";
                        echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                        while ($row = mysqli_fetch_assoc($result5)) {
                            echo "<tr>";
                            echo "<td>" . $row['eoi_id'] . "</td>";
                            echo "<td>" . $row['job_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['postcode'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['programming_lang'] . "</td>";
                            echo "<td>" . $row['otherskills'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching EOIs found.</p>";
                    }
                }
            
            // Deletes all EOIs of same job
            } elseif($_POST["eoiaction"] == "deletejob") {
                if(empty($_POST["jobrefnum2"])) {
                    echo "<p>Please select a Job Reference Number to begin.</p>";
                } else {
                    $jobrefnum2 = clean_input($conn, $_POST["jobrefnum2"]);
                    $query6 = "DELETE FROM eoi WHERE job_id = '".$jobrefnum2."'";
                    $result6 = mysqli_query($conn, $query6);
                    echo "<p>Execution successful!</p>";
                    echo "<p>Deleted all EOIs associated with Job Reference Number <strong>".$jobrefnum2."</strong>.</p>";
                }

            // Updates EOI status
            } else {
                if(empty($_POST["eoiid"]) && empty($_POST["status"])) {
                    echo "<p>Please select an EOI ID and a status to begin.</p>";
                } elseif(empty($_POST["eoiid"])) {
                    echo "<p>Please select an EOI ID to begin.</p>";
                } elseif(empty($_POST["status"])) {
                    echo "<p>Please select a status to begin.</p>";
                } else {
                    $eoiid = clean_input($conn, $_POST["eoiid"]);
                    $status = clean_input($conn, $_POST["status"]);
                    $query7 = "SELECT * FROM eoi WHERE eoi_id = ".$eoiid;
                    $result7 = mysqli_query($conn, $query7);
                    if(mysqli_num_rows($result7) == 0) {
                        echo "<p>Invalid EOI ID.</p>";
                    } else {
                        $query8 = "UPDATE eoi SET status = '".$status."' WHERE eoi_id = ".$eoiid;
                        $result8 = mysqli_query($conn, $query8);
                        $query9 = "SELECT * FROM eoi WHERE eoi_id = ".$eoiid;
                        $result9 = mysqli_query($conn, $query9);
                        echo "<p>Execution successful!</p>";
                        echo "<p>Here's the updated EOI:</p>";
                        echo "<table>";
                        echo "<tr> <th>EOI ID</th> <th>Position</th> <th>First name</th> <th>Last name</th> <th>Street address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email address</th> <th>Phone number</th> <th>Programming language(s)</th> <th>Other skill(s)</th> <th>Status</th> </tr>";
                        while ($row = mysqli_fetch_assoc($result9)) {
                            echo "<tr>";
                            echo "<td>" . $row['eoi_id'] . "</td>";
                            echo "<td>" . $row['job_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['postcode'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['programming_lang'] . "</td>";
                            echo "<td>" . $row['otherskills'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
            }
        } else {
            header('Location: manage.php');
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
