<?php
require_once('database.php');

$user_id - filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($user_id != false) {
    $query = "DELETE FROM users
              WHERE id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

include('users.php');
