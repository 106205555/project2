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
                        <a href="manage.php" class="active">Dashboard</a>
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
                </ul>
            </div>

            <!-- Main Dashboard Content -->
            <div class="dashboard-main">
                <h1>EOI Management Dashboard</h1>
                
                <!-- Get statistics -->
                <?php
                require_once("settings.php");
                $conn = mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Get eoi count
                $total_eois = 0;
                $new_eois = 0;
                $current_eois = 0;
                $final_eois = 0;

                $stats_query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) as new_count,
                    SUM(CASE WHEN status = 'Current' THEN 1 ELSE 0 END) as current_count,
                    SUM(CASE WHEN status = 'Final' THEN 1 ELSE 0 END) as final_count
                    FROM eoi";

                $stats_result = mysqli_query($conn, $stats_query);
                if ($stats_result && $row = mysqli_fetch_assoc($stats_result)) {
                    $total_eois = $row['total'];
                    $new_eois = $row['new_count'];
                    $current_eois = $row['current_count'];
                    $final_eois = $row['final_count'];
                }

                // Get job positions count
                $jobs_query = "SELECT COUNT(DISTINCT job_id) as job_count FROM eoi";
                $jobs_result = mysqli_query($conn, $jobs_query);
                $job_count = 0;
                if ($jobs_result && $row = mysqli_fetch_assoc($jobs_result)) {
                    $job_count = $row['job_count'];
                }

                mysqli_close($conn);
                ?>

                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-card-title">Total EOIs</div>
                        <div class="stat-card-value"><?php echo $total_eois; ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-title">New Status</div>
                        <div class="stat-card-value"><?php echo $new_eois; ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-title">Current Status</div>
                        <div class="stat-card-value"><?php echo $current_eois; ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-title">Final Status</div>
                        <div class="stat-card-value"><?php echo $final_eois; ?></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-title">Job Positions</div>
                        <div class="stat-card-value"><?php echo $job_count; ?></div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Recent Activity</h2>
                    </div>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-info">
                                <div class="activity-label">New EOIs</div>
                                <div class="activity-value"><?php echo $new_eois; ?> Items</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-info">
                                <div class="activity-label">Current EOIs</div>
                                <div class="activity-value"><?php echo $current_eois; ?> Items</div>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-info">
                                <div class="activity-label">Finalized EOIs</div>
                                <div class="activity-value"><?php echo $final_eois; ?> Items</div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Quick Actions</h2>
                    </div>
                    <div class="quick-actions">
                        <a href="list.php">List EOIs</a>
                        <a href="update_status.php">Update Status</a>
                        <a href="delete_eois.php">Delete EOIs</a>
                    </div>
                </div>

                <!-- Footer section: Bottom section of the web -->
                <?php include 'footer.inc'; ?>
            </div>
        </div>
    </main>
</body>
</html>
