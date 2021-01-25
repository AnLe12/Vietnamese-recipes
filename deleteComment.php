<?php
/**Thi Hoai An Le 000798006
 * December 10 2020
 * This file delete comments */
session_start();
include 'connect.php';
//Check whether username is available.
$access = isset($_SESSION["username"]);

$output = [];
$message="";    //Contain the message for error.
$check = 0;     //Variable for the status to check whether deleting is done
$commentID = filter_input(INPUT_GET, "commentID", FILTER_VALIDATE_INT);;

if($access){
    //Prepare the query and execute it
    $command ="DELETE FROM communication WHERE (commentID=? && userName = ?)";
    $stmt = $dbh -> prepare($command);
    $params = [$commentID, $_SESSION["username"]];
    $success = $stmt ->execute($params);
    //Assign the message to let user knows
    if($success){
        $message= "Delete sucessfully";
    }
    else{
        $check = 1;
        $message= "Delete failed";
    }
}
else{
    $check = 1;
    $message= "Connection error";
}
array_push($output,$check);
array_push($output,$message);
echo json_encode($output);
