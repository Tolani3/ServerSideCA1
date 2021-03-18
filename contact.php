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
            <label for='message'> Message:</label><br>
            <textarea name="message"></textarea>
        </p>
        <input type="submit" value="Submit"><br>
    </form>
    <?php
    include('includes/footer.php');
    ?>