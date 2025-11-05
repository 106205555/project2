<!DOCTYPE html>

<html lang="en">
<!-- Head section: Contains Web title and Metadata -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="Provides a form for GrandTech applications">
    <meta name="keywords" content="GrandTech, apply, form">
    <meta name="author" content="Duo Levellers">
    <title>GrandTech - Apply</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Header section: Top section of the web -->
    <?php include 'header.inc'; ?>

    <!-- Main section: Contains the main content of the web -->
    <main id="formmain">
        <h1>Application Form</h1>
        <p>Please fill in your details carefully.</p>
        <form method="post" action="process_eoi.php" novalidate="novalidate">
            <fieldset>
                <legend>Personal details</legend>
                <p>
                    <label for="firstname">First name</label>
                    <input type="text" id="firstname" name="firstname"
                           pattern="[A-Za-z]{1,20}" required>
                    <label for="lastname">Last name</label>
                    <input type="text" id="lastname" name="lastname"
                           pattern="[A-Za-z]{1,20}" required>
                </p>
                <p>
                    <label for="dob">Date of birth</label>
                    <input type="date" id="dob" name="dob" size="10" required>
                </p>
                <fieldset>
                    <legend>Gender</legend>
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="female">Female</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="other">Other</label>
                    <input type="radio" id="other" name="gender" value="other">
                </fieldset>
            </fieldset>

            <fieldset>
                <legend>Address information</legend>
                <p>
                    <label for="street">Street address</label>
                    <input type="text" id="street" name="street"
                           pattern=".{1,40}" required>
                    <label for="town">Suburb/town</label>
                    <input type="text" id="town" name="town"
                           pattern=".{1,40}" required>
                </p>
                <p>
                    <label for="state">State</label> 
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
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" name="postcode"
                           pattern="\d{4}" required>
                </p>
            </fieldset>

            <fieldset>
                <legend>Contact information</legend>
                <label for="email">Email address</label>
                <input type="text" id="email" name="email"
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <label for="phone">Phone number</label>
                <input type="text" id="phone" name="phone"
                       pattern="[\d\s]{8,12}" required>
            </fieldset>

            <fieldset>
                <legend>Job information</legend>
                <p>
                    <label for="refnum">Job reference number</label> 
			        <select name="jobrefnum" id="refnum">
				        <option value="">Please Select</option>
				        <option value="SP101">SP101</option>
				        <option value="DV201">DV201</option>
				        <option value="SC302">SC302</option>
                    </select>
                </p>
                <fieldset>
                    <legend>Required technical list</legend>
                    <p>Programming languages:</p>
                    <p>
                        <label for="html">HTML</label>
				        <input type="checkbox" id="html" name="prglang" value="html">
                        <label for="css">CSS</label>
				        <input type="checkbox" id="css" name="prglang" value="css">
                        <label for="java">JavaScript</label>
				        <input type="checkbox" id="java" name="prglang" value="java" checked="checked">
                        <label for="c">C/C++</label>
				        <input type="checkbox" id="c" name="prglang" value="c" checked="checked">
                        <label for="python">Python</label>
				        <input type="checkbox" id="python" name="prglang" value="python">
                    </p>
                </fieldset>
                <p>
                    <label for="extra">Other skills:</label>
                    <br>
                    <textarea id="extra" name="otherskills" rows="4" cols="40" placeholder="Do you have any other major skills?"></textarea>
                </p>
            </fieldset>

            <input type= "submit" value="Submit form" id="submit">
	        <input type= "reset" value="Reset form" id="reset">
        </form>
    </main>

    <!-- Footer section: Bottom section of the web -->
    <?php include 'footer.inc'; ?>
    
</body>
</html>
