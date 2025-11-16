<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Management</title>
    <link rel="stylesheet" href="styles/manage_styles.css">
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
                        <a href="list.php" class="active">List EOIs</a>
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
                <h1>List EOIs</h1>
                
                <!-- List All Option -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Quick List</h2>
                    </div>
                    <form method="post" action="manage_queryresult.php">
                        <input type="hidden" name="eoiaction" value="listall">
                        <button type="submit" class="list-option">
                            <div class="list-option-title">List All EOIs</div>
                            <div class="list-option-desc">View all expressions of interest in the system</div>
                        </button>
                    </form>
                </div>

                <!-- List by Job Position -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">List by Job Position</h2>
                    </div>
                    <form method="post" action="manage_queryresult.php" novalidate>
                        <input type="hidden" name="eoiaction" value="listjob">
                        <div class="form-group">
                            <label for="jobrefnum1">Job Reference Number</label>
                            <select name="jobrefnum1" id="jobrefnum1" required>
                                <option value="">Please Select</option>
                                <option value="SP101">SP101 - IT Support Technician</option>
                                <option value="DV201">DV201 - Software Developer</option>
                                <option value="SC302">SC302 - Cybersecurity Specialist</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-submit">List</button>
                    </form>
                </div>

                <!-- List by Applicant Name -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">List by Applicant Name</h2>
                    </div>
                    <form method="post" action="manage_queryresult.php">
                        <input type="hidden" name="eoiaction" value="listapplicant">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" pattern="[A-Za-z]{1,20}" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" pattern="[A-Za-z]{1,20}" placeholder="Enter last name">
                        </div>
                        <button type="submit" class="btn-submit">List</button>
                    </form>
                </div>

                <!-- Footer section: Bottom section of the web -->
                <?php include 'footer.inc'; ?>
            </div>
        </div>
    </main>
</body>
</html>
