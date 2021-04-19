<?php

//login.php

/**
 * Start the session.
 */
session_start();


/**
 * Include ircmaxell's password_compat library.
 */
require 'libary-folder/password.php';

/**
 * Include our MySQL connection.
 */
require 'login_connect.php';


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if (isset($_POST['login'])) {

    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    // $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    // $sql = "SELECT id, username, email, password FROM users WHERE username = :username";

    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':username', $username);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $message = 'Incorrect Login Details Please Try Again!!';

    //If $row is FALSE.
    if ($user === false) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        // header('Location: login.php');
        echo "<SCRIPT> 
        alert('$message')
        window.location.replace('login.php');
    </SCRIPT>";
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if ($validPassword) {

            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['username'];
            $_SESSION['logged_in'] = time();

            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';

            //Redirect to our protected page, which we called home.php
            header('Location: index.php');
            // header('Location: manage_players.php');
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
}

?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Login</h1>
    <form id="add_player_form" action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br>
        <label for='email'> Email:</label>
        <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$"><br>
        <label for="password">Password</label>
        <input type="password" id="myInput" required><br>
        <input type="checkbox" onclick="hidePassword()">Show Password<br>
        <input type="submit" name="login" value="Login">
    </form>
    <script src="scripts/password.js"></script>
    <script src="scripts/gen_validatorv31.js"></script>


    <?php
    include('includes/footer.php');
    ?>