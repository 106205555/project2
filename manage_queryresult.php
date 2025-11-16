<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Management</title>
    <link rel="stylesheet" href="styles/manage_styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/switchanim.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <div class="dashboard-wrapper">
            <!-- Left Sidebar Navigation -->
            <div class="dashboard-sidebar">
                <h3 class="sidebar-header">Navigation</h3>
                <ul class="sidebar-menu">
                    <li>
                        <a href="manage.php" class="inactive">Dashboard</a>
                    </li>
                    <li>
                        <a href="list.php" class="inactive">List EOIs</a>
                    </li>
                    <li>
                        <a href="update_status.php" class="inactive">Update Status</a>
                    </li>
                    <li>
                        <a href="delete_eois.php" class="inactive">Delete EOIs</a>
                    </li>
                    <li>
                        <a href="logout.php" class="inactive logout">Log Out</a>
                    </li>
                </ul>
            </div>

            <!-- Main Dashboard Content -->
            <div class="dashboard-main">
                <?php
                require_once("settings.php");

                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Checks if an EOI action has been selected
                    if(empty($_POST["eoiaction"])) {
                        echo "<p>Please select a database action to begin.</p>";

                    // Lists all EOIs
                    } elseif($_POST["eoiaction"] == "listall") {
                        $query1 = "SELECT * FROM eoi";
                        $result1 = mysqli_query($conn, $query1);
                        echo '<div class="message-box message-success">Execution successful!</div>';
                        echo '<h2>All EOIs</h2>';
                        if (mysqli_num_rows($result1) > 0) {
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
                            echo "<div class='warning-box'>No matching EOIs found.</div>";
                        }
                        echo '<div class="action-buttons">';
                        echo '<a href="list.php" class="btn">Return</a>';
                        echo '</div>';
                    
                    // Lists all EOIs of same job
                    } elseif($_POST["eoiaction"] == "listjob") {
                        if(empty($_POST["jobrefnum1"])) {
                            echo "<div class='message-box message-error'>Please select a Job Reference Number to begin search.</div>";
                        } else {
                            $jobrefnum1 = clean_input($conn, $_POST["jobrefnum1"]);
                            $query2 = "SELECT * FROM eoi WHERE job_id = '".$jobrefnum1."'";
                            $result2 = mysqli_query($conn, $query2);
                            echo '<div class="message-box message-success">Execution successful!</div>';
                            echo '<h2>EOIs for Job Reference: <strong>' . $jobrefnum1 . '</strong></h2>';
                            if (mysqli_num_rows($result2) > 0) {
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
                                echo "<div class='warning-box'>No matching EOIs found.</div>";
                            }
                        }
                        echo '<div class="action-buttons">';
                        echo '<a href="list.php" class="btn">Return</a>';
                        echo '</div>';
                    
                    // Lists all EOIs of same applicant name
                    } elseif($_POST["eoiaction"] == "listapplicant") {
                        // Empty
                        if(empty($_POST["firstname"]) && empty($_POST["lastname"])) {
                            echo "<div class='message-box message-error'>Please enter an applicant's name to begin search.</div>";
                        
                        // First name only
                        } elseif(!empty($_POST["firstname"]) && empty($_POST["lastname"])) {
                            $firstname = clean_input($conn, $_POST["firstname"]);
                            $query3 = "SELECT * FROM eoi WHERE first_name = '".$firstname."'";
                            $result3 = mysqli_query($conn, $query3);
                            echo '<div class="message-box message-success">Execution successful!</div>';
                            echo '<h2>Matching EOIs</h2>';
                            if (mysqli_num_rows($result3) > 0) {
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
                                echo "<div class='warning-box'>No matching EOIs found.</div>";
                            }

                        // Last name only
                        } elseif(empty($_POST["firstname"]) && !empty($_POST["lastname"])) {
                            $lastname = clean_input($conn, $_POST["lastname"]);
                            $query4 = "SELECT * FROM eoi WHERE last_name = '".$lastname."'";
                            $result4 = mysqli_query($conn, $query4);
                            echo '<div class="message-box message-success">Execution successful!</div>';
                            echo '<h2>Matching EOIs</h2>';
                            if (mysqli_num_rows($result4) > 0) {
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
                                echo "<div class='warning-box'>No matching EOIs found.</div>";
                            }
                        
                        // Both names given
                        } else {
                            $firstname = clean_input($conn, $_POST["firstname"]);
                            $lastname = clean_input($conn, $_POST["lastname"]);
                            $query5 = "SELECT * FROM eoi WHERE first_name = '".$firstname."' AND last_name = '".$lastname."'";
                            $result5 = mysqli_query($conn, $query5);
                            echo '<div class="message-box message-success">Execution successful!</div>';
                            echo '<h2>Matching EOIs</h2>';
                            if (mysqli_num_rows($result5) > 0) {
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
                                echo "<div class='warning-box'>No matching EOIs found.</div>";
                            }
                        }
                        echo '<div class="action-buttons">';
                        echo '<a href="list.php" class="btn">Return</a>';
                        echo '</div>';
                    
                    // Deletes all EOIs of same job
                    } elseif($_POST["eoiaction"] == "deletejob") {
                        if(empty($_POST["jobrefnum2"])) {
                            echo "<div class='message-box message-error'>Please select a Job Reference Number to begin.</div>";
                        } else {
                            $jobrefnum2 = clean_input($conn, $_POST["jobrefnum2"]);
                            $query6 = "DELETE FROM eoi WHERE job_id = '".$jobrefnum2."'";
                            $result6 = mysqli_query($conn, $query6);
                            echo "<div class='message-box message-success'>Successfully deleted all EOIs associated with Job Reference Number <strong>".$jobrefnum2."</strong>.</div>";
                        }
                        echo '<div class="action-buttons">';
                        echo '<a href="delete_eois.php" class="btn">Return</a>';
                        echo '</div>';

                    // Updates EOI status
                    } else {
                        if(empty($_POST["eoiid"]) || empty($_POST["status"])) {
                            echo "<div class='message-box message-error'>Please provide both EOI ID and status.</div>";
                        } else {
                            $eoiid = clean_input($conn, $_POST["eoiid"]);
                            $status = clean_input($conn, $_POST["status"]);
                            $query7 = "SELECT * FROM eoi WHERE eoi_id = ".$eoiid;
                            $result7 = mysqli_query($conn, $query7);
                            if(mysqli_num_rows($result7) == 0) {
                                echo "<div class='message-box message-error'>Invalid EOI ID.</div>";
                            } else {
                                $query8 = "UPDATE eoi SET status = '".$status."' WHERE eoi_id = ".$eoiid;
                                $result8 = mysqli_query($conn, $query8);
                                $query9 = "SELECT * FROM eoi WHERE eoi_id = ".$eoiid;
                                $result9 = mysqli_query($conn, $query9);
                                echo "<div class='message-box message-success'>Execution successful!</div>";
                                echo "<h2>Updated EOI</h2>";
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
                        echo '<div class="action-buttons">';
                        echo '<a href="update_status.php" class="btn">Return</a>';
                        echo '</div>';
                    }

                    mysqli_close($conn);
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

                <!-- Footer section: Bottom section of the web -->
                <?php include 'footer.inc'; ?>
            </div>
        </div>
    </main>
</body>
</html>
