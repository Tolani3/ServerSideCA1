<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */


require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get players for selected category
$queryRecords = "SELECT * FROM players
WHERE categoryID = :category_id
ORDER BY playerID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$players = $statement3->fetchAll();
$statement3->closeCursor();

//Shows all users
$queryAllUsers = 'SELECT * FROM users';
$statement4 = $db->prepare($queryAllUsers);
$statement4->execute();
$users = $statement4->fetchAll();
$statement4->closeCursor();
?>

<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Manage Players</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div id="parent">
                <h2>USERS</h2>
                <ul>
                    <div id="popup"><?php foreach ($users as $users) : ?>
                            <li>
                                <?php echo $users['username'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </div>
                </ul>
            </div>

        </nav>
    </aside>

    <section>
        <!-- display a table of players -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>D.O.B</th>
                <th>Position</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Buy</th>
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><img src="image_uploads/<?php echo $player['image']; ?>" width="100px" height="100px" /></td>
                    <td><?php echo $player['name']; ?></td>
                    <td><?php echo $player['DateOfBirth']; ?></td>
                    <td><?php echo $player['position']; ?></td>
                    <td class="right"><?php echo "€" . $player['price']; ?></td>
                    <td>
                        <form action="delete_player.php" method="post" id="delete_record_form">
                            <input type="hidden" name="player_id" value="<?php echo $player['playerID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $player['categoryID']; ?>">
                            <input id="delete_button" type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="edit_player_form.php" method="post" id="delete_record_form">
                            <input type="hidden" name="player_id" value="<?php echo $player['playerID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $player['categoryID']; ?>">
                            <input id="edit_button" type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="purchase_player_form.php" method="post">
                            <input type="hidden" name="player_id" value="<?php echo $player['playerID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $player['categoryID']; ?>">
                            <input type="hidden" name="name" value="<?php echo $player['name']; ?>">
                            <input id="purchase_button" type="submit" value="Buy" class="green-button">

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a id="addplayer" href="add_player_form.php">Add Player</a></p>
    </section>


    <?php
    include('includes/footer.php');
    ?>