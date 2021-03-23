<!-- the head section -->
<?php $name = filter_input(INPUT_POST, 'fullName');
$player = filter_input(INPUT_POST, 'playerName');
$phoneNo = filter_input(INPUT_POST, 'phoneNo');
$address = filter_input(INPUT_POST, 'address');
$postCode = filter_input(INPUT_POST, 'postCode');
$totalPrice = filter_input(INPUT_POST, 'passedValuePrice');
$deliveryMethod = filter_input(INPUT_POST, 'shipping');
?>

<div class="container">
      <?php
      include('includes/header.php');

      ?>
      <h1>Purchase Complete ! </h1>
      <div class="add_player_form.php">

            <label>player: </label>
            <span><?php echo strtoupper($player) ?>

            </span><br>
            <label>Full Name: </label><span><?php echo strtoupper($name) ?></span> <br>
            <label>Address:</label> <span><?php echo strtoupper($address) ?> </span><br>
            <label>Price Total: </label><span><?php echo ($totalPrice) ?></span><br>
            <label>Shipping:</label><span> <?php echo ($deliveryMethod) ?> </span><br>

      </div>

      <p><a href="index.php">Homepage</a></p>
      <?php
      include('includes/footer.php');
      ?>