<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="Describes various available positions at GrandTech company">
    <meta name="keywords" content="GrandTech, jobs, positions">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Careers</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/switchanim.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <?php
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        ?>

        <aside>
            <h2>Important notice</h2>
            <p><em>Please note that application will be closed before 15 Oct 2025, so please apply now to ensure your opportunity.</em></p>
        </aside>
        
        <section>
            <h1>Available positions</h1>
            <p>Want to be a part of GrandTech? We are still open to new applications!</p>
            <p>View a list of available positions now:</p>
            <ol>
                <li>IT Support Technician. <a href="#itsup">View</a></li>
                <li>Software Developer. <a href="#swdev">View</a></li>
                <li>Cybersecurity Specialist. <a href="#cysec">View</a></li>
            </ol>
        </section>

        <!-- IT Support Technician section -->
        <section id="itsup">
            <?php
            $query1 = "SELECT * FROM jobs WHERE job_id = 'SP101'";
            $result1 = mysqli_query($conn, $query1);
            $sp101 = mysqli_fetch_assoc($result1);

            echo "<h2>1. ".$sp101['name']."</h2>";
            echo "<p>".$sp101['brief_desc']."</p>";
            echo "<p>Essential position details:</p>";
            echo "<ul>";
            echo "<li>Job reference number: <strong>".$sp101['job_id']."</strong></li>";
            echo "<li>Salary range: ".$sp101['salary']." per month</li>";
            echo "<li>Responsibilities:";
            echo "<ul>".$sp101['responsibilities']."</ul>";
            echo "</li>";
            echo "<li>Requirements:<ul>";
            echo "<li><strong>Education:</strong> ".$sp101['education']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Technical Knowledge:</strong> ".$sp101['knowledge']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Soft Skills:</strong> ".$sp101['soft_skills']." <strong>(preferrable)</strong></li>";
            echo "<li><strong>Experience:</strong> ".$sp101['experience']." <strong>(preferrable)</strong></li>";
            echo "</ul></li>";
            echo "</ul>";
            ?>
        </section>

        <!-- Software Developer section -->
        <section id="swdev">
            <?php
            $query2 = "SELECT * FROM jobs WHERE job_id = 'DV201'";
            $result2 = mysqli_query($conn, $query2);
            $dv201 = mysqli_fetch_assoc($result2);

            echo "<h2>2. ".$dv201['name']."</h2>";
            echo "<p>".$dv201['brief_desc']."</p>";
            echo "<p>Essential position details:</p>";
            echo "<ul>";
            echo "<li>Job reference number: <strong>".$dv201['job_id']."</strong></li>";
            echo "<li>Salary range: ".$dv201['salary']." per month</li>";
            echo "<li>Responsibilities:";
            echo "<ul>".$dv201['responsibilities']."</ul>";
            echo "</li>";
            echo "<li>Requirements:<ul>";
            echo "<li><strong>Education:</strong> ".$dv201['education']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Technical Knowledge:</strong> ".$dv201['knowledge']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Soft Skills:</strong> ".$dv201['soft_skills']." <strong>(preferrable)</strong></li>";
            echo "<li><strong>Experience:</strong> ".$dv201['experience']." <strong>(preferrable)</strong></li>";
            echo "</ul></li>";
            echo "</ul>";
            ?>
        </section>

        <!-- Cybersecurity Specialist section -->
        <section id="cysec">
            <?php
            $query3 = "SELECT * FROM jobs WHERE job_id = 'SC302'";
            $result3 = mysqli_query($conn, $query3);
            $sc302 = mysqli_fetch_assoc($result3);

            echo "<h2>3. ".$sc302['name']."</h2>";
            echo "<p>".$sc302['brief_desc']."</p>";
            echo "<p>Essential position details:</p>";
            echo "<ul>";
            echo "<li>Job reference number: <strong>".$sc302['job_id']."</strong></li>";
            echo "<li>Salary range: ".$sc302['salary']." per month</li>";
            echo "<li>Responsibilities:";
            echo "<ul>".$sc302['responsibilities']."</ul>";
            echo "</li>";
            echo "<li>Requirements:<ul>";
            echo "<li><strong>Education:</strong> ".$sc302['education']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Technical Knowledge:</strong> ".$sc302['knowledge']." <strong class='required'>(essential)</strong></li>";
            echo "<li><strong>Soft Skills:</strong> ".$sc302['soft_skills']." <strong>(preferrable)</strong></li>";
            echo "<li><strong>Experience:</strong> ".$sc302['experience']." <strong>(preferrable)</strong></li>";
            echo "</ul></li>";
            echo "</ul>";
            ?>
        </section>

        <p><em>Ready to apply for a position?</em> <a href="apply.php">Apply now</a></p>
        <?php mysqli_close($conn); ?>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
<!-- Job Desc source: https://chatgpt.com/ -->