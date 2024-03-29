<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
require_once('database.php');

// session_start();
// if (!isset($_SESSION['user_id']) || ($_SESSION['login'])) {
//     header('Location: manage_players.php');
// }

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
?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Player List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- <div id="parent">
                <h2>Option</h2>
                <ul>
                    <div id="popup">
                        <li>
                            <?php
                            if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'] != 1)) {
                            ?>
                                <a href="login.php">Login as Admin</a>

                                </a>
                            <?php } else { ?>
                                <a href="users.php">Users</a>
                            <?php } ?>
                        </li>

                    </div>
                </ul>
            </div> -->

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
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><img src="image_uploads/<?php echo $player['image']; ?>" width="100px" height="100px" /></td>
                    <td><?php echo $player['name']; ?></td>
                    <td><?php echo $player['DateOfBirth']; ?></td>
                    <td><?php echo $player['position']; ?></td>
                    <td class="right"><?php echo "€" . $player['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- <p><a href="add_player_form.php">Add Record</a></p> -->
        <!-- <p><a href="category_list.php">Manage Categories</a></p>
        <p><a href="contact.php">Contact Us</a></p> -->

    </section>


    <?php
    include('includes/footer.php');
    ?>