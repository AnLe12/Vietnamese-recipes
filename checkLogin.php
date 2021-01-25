<?php
/**
 * Thi Hoai An Le 000798006
 * December 10 2020  
 * This file validate the iput and insert the input to the user table 
 * if the account is unique 
 */
session_start();

include 'connect.php';
//Validate the inputs.
$username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_GET, "password", FILTER_SANITIZE_SPECIAL_CHARS);

$result = false;   //Variable for the status to check whether username exist
$message = "";      //Contain the message for error.


if ($username != null and $password != null) {
    //Check whether username is existed in user table
    $command = "SELECT userId, userName, password FROM user WHERE userName =?";
    $stmt = $dbh->prepare($command);
    $params = [$username];
    $success = $stmt->execute($params);
    //Check password if it has username in user table
    if ($success) {
        if ($row = $stmt->fetch()) {

            $hashPassword = $row["password"];
            // Compare password input with password in table
            if (password_verify($password, $hashPassword)) {
                // Declare values for session
                $_SESSION["userId"] = $row[0];
                $_SESSION["username"] = $username;
                $result = true;
            } else {
                $message = "Wrong password.";
            }
        } else {
            $message = "User is wrong.";
        }
    } else {
        //If it does not have in user table, destroy session
        session_unset();
        session_destroy();
    }
} else {
    $message = "Connection error";
}

if ($result) {
    $dataList = [$result, $_SESSION["username"]];
} else {
    $dataList = [$result, $message];
}
echo json_encode($dataList);
