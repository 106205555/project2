<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Register</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main class="form-container">
        <div class="form-card">
            <h1>Registration Form</h1>
            <p>Please fill in your details carefully.</p>
            <form method="post" action="register_result.php" novalidate>
                <fieldset>
                    <legend>Account details</legend>
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
                </fieldset>
                
                <fieldset>
                    <legend>Personal details</legend>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="firstname" pattern="[A-Za-z]{1,20}" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" id="lastname" name="lastname" pattern="[A-Za-z]{1,20}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                </fieldset>

                <div class="button-group">
                    <input type= "submit" value="Submit form" id="submit">
                    <input type= "reset" value="Reset form" id="reset">
                </div>
            </form>
        </div>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
