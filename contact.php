<?php
session_start();
?>

<!-- The Head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Contact Us</h1>
    <form method="POST" name="contactform" action="contact-form-handler.php">
        <p>
            <label for='name'>Your Name:</label> <br>
            <input type="text" name="name">
        </p>

        <p>
            <label for='email'> Email Address:</label><br>
            <input type="text" name="email">
        </p>

        <p>
        <div id="parent">
            <label id="parent" for='phoneNumber'> Phone Number:</label><br>
            <div id="popup">xxx-xxx-xxxx</div>
            <input type="text" name="phoneNumber">
        </div>
        </p>

        <p>
            <label for='message'> Message:</label><br>
            <textarea name="message" required></textarea>
        </p>

        <input type="submit" value="Submit"><br>
    </form>
    <script language="JavaScript">
        var frmvalidator = new Validator("contactform");
        frmvalidator.addValidation("name", "req", "Please provide your name");
        frmvalidator.addValidation("email", "req", "Please provide your email");
        frmvalidator.addValidation("phoneNumber", "req", "Please provide your phoneNumber");
        frmvalidator.addValidation("email", "email", "Please enter a valid email address");
    </script>
    <?php
    include('includes/footer.php');
    ?>