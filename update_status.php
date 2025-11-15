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
                        <a href="update_status.php" class="active">Update Status</a>
                    </li>
                    <li>
                        <a href="delete_eois.php" class="inactive">Delete EOIs</a>
                    </li>
                </ul>
            </div>

            <!-- Main Dashboard Content -->
            <div class="dashboard-main">
                <h1>Update EOI Status</h1>
                
                <form method="post" action="manage_queryresult.php" novalidate="novalidate">
                    <input type="hidden" name="eoiaction" value="updstatus">
                    <div class="dashboard-section">
                        <div class="section-header">
                            <h2 class="section-title">Update Status</h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="eoiid">EOI ID <span class="required-field">*</span></label>
                                <input type="number" id="eoiid" name="eoiid" placeholder="Enter EOI ID" required>
                            </div>
                            <div class="form-group">
                                <label for="status">New Status <span class="required-field">*</span></label>
                                <select id="status" name="status" required>
                                    <option value="">Please Select</option>
                                    <option value="New">New</option>
                                    <option value="Current">Current</option>
                                    <option value="Final">Final</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">Update Status</button>
                </form>

                <!-- Footer section: Bottom section of the web -->
                <?php include 'footer.inc'; ?>
            </div>
        </div>
    </main>
</body>
</html>
