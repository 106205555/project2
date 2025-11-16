<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Login</title>
    <link rel="stylesheet" href="styles/manage_styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/switchanim.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <div class="login-page dashboard-main">
            <div class="login-page-title">
                <h1>Log In</h1>
                <p>Please log in to access the admin panel.</p>
            </div>
            
            <form method="post" action="login_result.php" novalidate>
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Login</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" pattern="{1,20}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" pattern="{1,20}" required>
                        </div>
                    </div>

                    <?php
                    if(isset($_GET['error'])) {
                        echo "<span class='incorrect-msg'>Incorrect username or password.</span>";
                    }
                    ?>
                </div>
                <button type="submit" class="btn-submit">Log In</button>
            </form>
        </div>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
