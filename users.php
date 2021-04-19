<?php
session_start();
require_once('database.php');


if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Get users for selected category
$queryRecords = "SELECT * FROM users";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue('user_id', $user_id);
$statement3->execute();
$user = $statement3->fetchAll();
$statement3->closeCursor();

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
?>

<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Users List</h1>

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
        </nav>
    </aside>

    <section>
        <!-- display a table of players -->
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($user as $user) : ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <form action="delete_user.php" method="post" id="delete_record_form">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
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