<!-- the head section -->

<?php

?>


<head>
    <title>My PHP CRUD App</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<!-- the body section -->

<body>
    <header>
        <img src="image_uploads/football2.png" id="header_image">
        <h1>Player Database</h1>
        <div class="topnav">
            <a class="active" href="index.php">Home</a>
            <a href="manage_players.php">Manage Players</a>
            <a href="contact.php">Contact</a>
            <a href="users.php">Users</a>

            <?php
            if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'] != 0)) {
            ?>
                <a href="logout.php">Logut</a>

            <?php } else { ?>

                <a href="register.php">Regsiter</a>
                <a href="login.php">Login</a>
            <?php } ?>
        </div>
    </header>