<?php
/**
 * Thi Hoai An Le 000798006
 *December 10 2020
 *This file add comments 
 */
session_start();
include 'connect.php';
//Check whether username is available.
$access = isset($_SESSION["username"]);

$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
$output = [];
$message = "";    //Contain the message for error.
$check = 0;     //Variable for the status to check whether deleting is done
if ($access) {
    //Prepare the query and execute it
    $command = "INSERT INTO communication (userID, recipeName, userName, comment, recipeID) VALUES (?,?,?,?,?)";
    $stmt = $dbh->prepare($command);
    $params = [$_SESSION['userId'], $_SESSION['recipeName'], $_SESSION['username'], $comment, $_SESSION['recipeId']];
    $success = $stmt->execute($params);
    //Assign the message to let user knows
    if ($success) {
        $message = "Insert sucessfully";
    } else {
        $message = "Insert failed";
        $check = 1;
    }
} else {
    $check = 1;
    $message = "Connection error";
}
array_push($output, $check);
array_push($output, $message);
echo json_encode($output);
