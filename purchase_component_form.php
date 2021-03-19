<?php
require('database.php');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
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
       <h1>Details</h1>
       <form action="purchase_component.php" method="post" enctype="multipart/form-data" class="add_component_form">
              <input type="hidden" name="player_id" value="<?php echo $players['playerID']; ?>">
              <input type="hidden" name="componentName" value="<?php echo $players['name']; ?>">


              <?php if ($players['image'] != "") { ?>
                     <p><img id="purchase-picture" src="image_uploads/<?php echo $players['image']; ?>" height="300" /></p>
              <?php } ?>

              <label>Component Name:</label>
              <p class="product_info"><?php echo $players['name']; ?> </p>

              <div>
                     <label id="label_checkMark" for="fullName">Full Name: </label>
                     <input type="input" id="fullName" name="fullName" required onkeyup="validate_name()">
                     <p></p>
              </div>
              <br>

              <div>
                     <label id="label_checkMark2" for="phoneNo">Phone No: </label>
                     <input type="input" id="phoneNo" name="phoneNo" required onkeyup="validate_phone()">
                     <br>
              </div>

              <div>
                     <label id="label_checkMark3" for="address">Address: </label>
                     <input type="input" id="address" name="address" required size="50%" />
                     <br><br>
              </div>

              <div>
                     <label id="label_checkMark4" for="postCode">Post Code: </label>
                     <input type="input" id="postCode" name="postCode" required onkeyup="validate_postcode()">
                     <br>
              </div>

              <div>
                     <label>Price:</label>
                     <p class="product_info"><?php echo ('€' . $players['price']); ?></p>
              </div>

              <label>Shipping Method:</label>
              <input type="radio" id="priority" name="shipping" value="Priority" onclick="findTotal(10,<?php echo $players['price'] ?>)" required>
              <label for="priority">Priority Shipping: €10 </label>
              <br>

              <label></label>
              <input type="radio" id="free" name="shipping" value="Free" onclick="findTotal(0,<?php echo $players['price'] ?>)">
              <label for="free">Free Shipping</label>
              <br>

              <label>Total: </label>
              <p id="totalPrice" class="product_info" name="total"><?php echo ('€' . $players['price']); ?></p>

              <label>&nbsp;</label>
              <input type="submit" value="Purchase" class="green-button" id="submit" disabled=true">
              <br>

              <input type="hidden" id="passedValuePrice" name="passedValuePrice" value="findTotal(<?php echo $players['price']; ?>)">
       </form>

       <script src="validation.js"></script>


       <p><a href=".?category_id=<?php echo $category_id ?>">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>