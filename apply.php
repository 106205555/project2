<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="Provides a form for GrandTech applications">
    <meta name="keywords" content="GrandTech, apply, form">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Apply</title>
    <link rel="stylesheet" href="styles/styles.css?v=2">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main class="form-container">
        <div class="form-card">
            <h1>Application Form</h1>
            <p>Please fill in your details carefully.</p>
            <form method="post" action="process_eoi.php" novalidate="novalidate">
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

                    <fieldset>
                        <legend>Gender</legend>
                        <div class="radio-group">
                            <label>
                                <input type="radio" id="male" name="gender" value="Male" required>
                                <span>Male</span>
                            </label>
                            <label>
                                <input type="radio" id="female" name="gender" value="Female">
                                <span>Female</span>
                            </label>
                            <label>
                                <input type="radio" id="other" name="gender" value="Other">
                                <span>Other</span>
                            </label>
                        </div>
                    </fieldset>
                </fieldset>

                <fieldset>
                    <legend>Address information</legend>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="street">Street address:</label>
                            <input type="text" id="street" name="street" pattern=".{1,40}" required>
                        </div>
                        <div class="form-group">
                            <label for="town">Suburb/town:</label>
                            <input type="text" id="town" name="town" pattern=".{1,40}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="state">State:</label> 
                            <select name="state" id="state">
                                <option value="">Please Select</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode:</label>
                            <input type="text" id="postcode" name="postcode" pattern="\d{4}" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Contact information</legend>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="text" id="phone" name="phone" pattern="[\d\s]{8,12}" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Job information</legend>
                    <div class="form-group">
                        <label for="refnum">Job reference number:</label> 
                        <select name="jobrefnum" id="refnum">
                            <option value="">Please Select</option>
                            <option value="SP101">SP101 - IT Support Technician</option>
                            <option value="DV201">DV201 - Software Developer</option>
                            <option value="SC302">SC302 - Cybersecurity Specialist</option>
                        </select>
                    </div>
                    <fieldset>
                        <legend>Programming languages</legend>
                        <div class="checkbox-group">
                            <label>
                                <input type="checkbox" id="html" name="prglang[]" value="HTML">
                                <span>HTML</span>
                            </label>
                            <label>
                                <input type="checkbox" id="css" name="prglang[]" value="CSS">
                                <span>CSS</span>
                            </label>
                            <label>
                                <input type="checkbox" id="java" name="prglang[]" value="JavaScript" checked="checked">
                                <span>JavaScript</span>
                            </label>
                            <label>
                                <input type="checkbox" id="c" name="prglang[]" value="C/C++" checked="checked">
                                <span>C/C++</span>
                            </label>
                            <label>
                                <input type="checkbox" id="python" name="prglang[]" value="Python">
                                <span>Python</span>
                            </label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="extra">Other skills:</label>
                        <textarea id="extra" name="otherskills" rows="4" cols="40" placeholder="Do you have any other major skills?"></textarea>
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
