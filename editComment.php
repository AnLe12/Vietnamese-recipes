

<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file edit comments */
session_start();
include 'connect.php';
//Check whether username is available.
$access = isset($_SESSION["username"]);

$output = [];
$message="";    //Contain the message for error.
$check = 0;     //Variable for the status to check whether deleting is done

//Validate the input
$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
$cmtId = filter_input(INPUT_POST, "commentID", FILTER_VALIDATE_INT);

if($access){
    //Prepare the query and execute it
    $command ="UPDATE communication SET comment = ? WHERE commentID= ?";
    $stmt = $dbh -> prepare($command);
    $params = [$comment,$cmtId];
    $success = $stmt ->execute($params);
    //Assign the message to let user knows
    if($success){
        $message="Edit sucessfully";
        
    }
    else{
        $message="Edit failed";
        $check = 1;
    }
}
else{
    $message="Connection error";
    $check = 1;
}
array_push($output,$check);
array_push($output,$message);
echo json_encode($output);