<?php

// Get the player data
$player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$DateOfBirth = filter_input(INPUT_POST, 'DateOfBirth');
$position = filter_input(INPUT_POST, 'position');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($player_id == NULL || $player_id == FALSE || $category_id == NULL ||
$category_id == FALSE || empty($name) ||
$DateOfBirth == NULL ||$position == NULL ||
$price == NULL || $price == FALSE) {
$error = "Invalid player data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the player in the database
require_once('database.php');

$query = 'UPDATE players
SET categoryID = :category_id,
name = :name,
DateOfBirth = :DateOfBirth,
position = :position,
price = :price,
image = :image
WHERE playerID = :player_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':name', $name);
$statement->bindValue(':DateOfBirth', $DateOfBirth);
$statement->bindValue(':position', $position);
$statement->bindValue(':price', $price);
$statement->bindValue(':image', $image);
$statement->bindValue(':player_id', $player_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>