<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Enhancements</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/switchanim.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <section>
            <h1>Enhancements</h1>
            <p>The Login page controls access to Management pages. Here are some of its features:</p>
            <ul class="login-feat">
                <li>If a Management page is accessed directly through URL in a logged-out state, it will redirect the user to login.php.</li>
                <li>The Login page uses login_result.php to check the credentials by comparing user inputs with data in the 'user_data' table.</li>
                <li>If a user enters a wrong username or password, they will be redirected back to the Login page with an error message.</li>
                <li>If a user enters the right username and password (MinhHieuLe and 106205555, respectively), they will be redirected to manage.php in a logged-in state.</li>
                <li>The user can log out using the button on the admin navigation bar of every Management page. This will redirect them back to login.php in a logged-out state.</li>
            </ul>
        </section>
        
        <div class="login-pic">
            <figure>
                <img src="images/Login_page.png" title="Login page" alt="Login page" width="400" height="225">
                <figcaption>The Login page</figcaption>
            </figure>
            <figure>
                <img src="images/Login_page_error.png" title="Login page with an error message" alt="Login page with an error message" width="400" height="225">
                <figcaption>The Login page after a failed login attempt</figcaption>
            </figure>
            <figure>
                <img src="images/Logout_button.png" title="Logout button" alt="Logout button" width="400" height="225">
                <figcaption>The Logout button</figcaption>
            </figure>
        </div>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
