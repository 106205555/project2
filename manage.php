<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Management</title>
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main>
        <form method="post" action="manage_queryresult.php" novalidate="novalidate">
            <fieldset>
                <legend>Database actions</legend>

                <input type="radio" id="all" name="eoiaction" value="listall" required>
                <label for="all">List all EOIs</label>
                <br><br>
                <input type="radio" id="job" name="eoiaction" value="listjob">
                <label for="job">List all EOIs for a particular position:
                    <br>
                    <label for="refnum">Job reference number:</label> 
                    <select name="jobrefnum" id="refnum">
                        <option value="">Please Select</option>
                        <option value="SP101">SP101 - IT Support Technician</option>
                        <option value="DV201">DV201 - Software Developer</option>
                        <option value="SC302">SC302 - Cybersecurity Specialist</option>
                    </select>
                </label>
                <br><br>
                <input type="radio" id="applicant" name="eoiaction" value="listapplicant">
                <label for="applicant">List all EOIs for a particular applicant:
                    <br>
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" pattern="[A-Za-z]{1,20}">
                    <br>
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" pattern="[A-Za-z]{1,20}">
                </label>
                <br><br>
                <input type="radio" id="delete" name="eoiaction" value="deletejob">
                <label for="delete">Delete all EOIs for a particular position:
                    <br>
                    <label for="refnum">Job reference number:</label> 
                    <select name="jobrefnum" id="refnum">
                        <option value="">Please Select</option>
                        <option value="SP101">SP101 - IT Support Technician</option>
                        <option value="DV201">DV201 - Software Developer</option>
                        <option value="SC302">SC302 - Cybersecurity Specialist</option>
                    </select>
                </label>
                <br><br>
                <input type="radio" id="updstatus" name="eoiaction" value="updstatus">
                <label for="updstatus">Change the Status of an EOI:
                    <br>
                    <label for="eoi">EOI ID:</label>
                    <input type="number" id="eoi" name="eoiid">
                    <br>
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="">Please Select</option>
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
                    </select>
                </label>
            </fieldset>

            <br>
            <input type="submit" value="Search database">
        </form>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
