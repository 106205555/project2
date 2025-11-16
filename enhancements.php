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
        <h1>Enhancements</h1>
        <p>The Login page controls access to Management pages. Here are some of its features:</p>
        <ul>
            <li>If a Management page is accessed directly through URL in a logged-out state, it will redirect the user to login.php.</li>
            <li>The Login page uses login_result.php to check the credentials by comparing user inputs with data in the 'user_data' table.</li>
            <li>If a user enters a wrong username or password, they will be redirected back to the Login page with an error message.</li>
            <li>If a user enters the right username and password (MinhHieuLe and 106205555, respectively), they will be redirected to manage.php in a logged-in state.</li>
            <li>The user can log out using the button on the admin navigation bar of every Management page. This will redirect them back to login.php in a logged-out state.</li>
        </ul>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
