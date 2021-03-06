<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Player</h1>
        <form action="add_player.php" method="post" enctype="multipart/form-data"
              id="add_player_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name" required>
            <br>

            <label>D.O.B:</label>
            <input type="date" name="DateOfBirth" min="1971-01-01" max="2021-03-15">
            <br>

            <label>Position:</label>
            <input type="input" name="position" required>
            <br>

            <label>List Price:</label>
            <input type="number" name="price" min="5.00" required>
            <br>        
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add player">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>