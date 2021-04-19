<?php

session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != 1)) {
    $message = 'Only Admin can delete';
    echo "<SCRIPT> 
    alert('$message')
    window.location.replace('category_list.php');
</SCRIPT>";
    // mysql_close();
    exit;
}

// Get ID
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($category_id == null || $category_id == false) {
    $error = "Invalid category ID.";
    include('error.php');
} else {
    require_once('database.php');

    // delete the category to the database  
    $query = 'DELETE FROM categories 
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
