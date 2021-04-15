<?php
require('database.php');

session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != 1)) {
       header('Location: manage_players.php');
       exit;
}

$player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM players
          WHERE playerID = :player_id';
$statement = $db->prepare($query);
$statement->bindValue(':player_id', $player_id);
$statement->execute();
$players = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
       <?php
       include('includes/header.php');
       ?>
       <h1>Edit Product</h1>
       <form action="edit_player.php" method="post" enctype="multipart/form-data" id="add_player_form">
              <input type="hidden" name="original_image" value="<?php echo $players['image']; ?>" />
              <input type="hidden" name="player_id" value="<?php echo $players['playerID']; ?>">

              <label>Category ID:</label>
              <input type="category_id" name="category_id" value="<?php echo $players['categoryID']; ?>">
              <br>

              <label>Name:</label>
              <input type="input" name="name" required value="<?php echo $players['name']; ?>">
              <br>

              <label>D.O.B:</label>
              <input type="date" name="DateOfBirth" min="1971-01-01" max="2021-03-15" required value="<?php echo $players['DateOfBirth']; ?>">
              <br>

              <label>Position:</label>
              <input type="input" name="position" required value="<?php echo $players['position']; ?>">
              <br>

              <label>List Price:</label>
              <input type="number" name="price" min="5.00" required value="<?php echo $players['price']; ?>">
              <br>

              <label>Image:</label>
              <input type="file" name="image" accept="image/*" />
              <br>
              <?php if ($players['image'] != "") { ?>
                     <p><img src="image_uploads/<?php echo $players['image']; ?>" height="150" /></p>
              <?php } ?>

              <label>&nbsp;</label>
              <input type="submit" value="Save Changes">
              <br>
       </form>
       <p><a href="index.php">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>