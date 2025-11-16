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
                        <a href="list.php" class="inactive">List EOIs</a>
                    </li>
                    <li>
                        <a href="update_status.php" class="inactive">Update Status</a>
                    </li>
                    <li>
                        <a href="delete_eois.php" class="active">Delete EOIs</a>
                    </li>
                    <li>
                        <a href="logout.php" class="inactive logout">Log Out</a>
                    </li>
                </ul>
            </div>

            <!-- Main Dashboard Content -->
            <div class="dashboard-main">
                <h1>Delete EOIs</h1>
                
                <div class="warning-box">
                    <strong>Warning:</strong> This action will permanently delete all EOIs associated with the selected job position. This action cannot be undone.
                </div>

                <form method="post" action="manage_queryresult.php" novalidate="novalidate" onsubmit="return confirm('Are you sure you want to delete all EOIs for this job position? This action cannot be undone.');">
                    <input type="hidden" name="eoiaction" value="deletejob">
                    <div class="dashboard-section">
                        <div class="section-header">
                            <h2 class="section-title">Delete by Job Position</h2>
                        </div>
                        <div class="form-group">
                            <label for="jobrefnum2">Job Reference Number <span class="required-field">*</span></label>
                            <select name="jobrefnum2" id="jobrefnum2" required>
                                <option value="">Please Select</option>
                                <option value="SP101">SP101 - IT Support Technician</option>
                                <option value="DV201">DV201 - Software Developer</option>
                                <option value="SC302">SC302 - Cybersecurity Specialist</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn-delete">Delete EOIs</button>
                </form>

                <!-- Footer section: Bottom section of the web -->
                <?php include 'footer.inc'; ?>
            </div>
        </div>
    </main>
</body>
</html>
