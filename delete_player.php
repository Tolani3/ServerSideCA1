<?php
require_once('database.php');

session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != 1)) {
       header('Location: index.php');
       exit;
}

// Get IDs
$player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($player_id != false && $category_id != false) {
    $query = "DELETE FROM players
              WHERE playerID = :player_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
