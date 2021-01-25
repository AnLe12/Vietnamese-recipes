<?php
/**Thi Hoai An Le 000798006
 * December 10 2020
 * This file validate the input and insert the input to the user table 
 * if the account is unique */

session_start();
include "connect.php";
//Validate the inputs.
$username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password =filter_input(INPUT_GET, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$email =filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL);

$check = false;   //Variable for the status to check whether the unique username 
$message= "";      //Contain the message for error.

// Select item input and check does it exist in database or no
if ($username != null and $password != null and $email != null) {
    
    //Check whether username is unique
    $command1 = "SELECT * FROM user WHERE (userName =?)" ;
    $stmt1 = $dbh -> prepare($command1);
    $params1 = [$username];
    $success1 = $stmt1 -> execute($params1);
    // fetch_array the first element. If returning null, the username does not exist in the database
    $userNameCheck = $stmt1 -> fetch();

    //Check whether email is unique
    $command2 = "SELECT * FROM user WHERE (email =?)" ;
    $stmt2 = $dbh -> prepare($command2);
    $params2 = [$email];
    $success2 = $stmt2 -> execute($params2);
    // fetch_array the first element. If returning null, the email does not exist in the database
    $emailCheck = $stmt2 -> fetch();
    

    
    if($userNameCheck != null){
        // Save the message if the username is not unique
        $message = "Username already exists";
    }
    else if($emailCheck != null){
        // Save the message if email is not unique
        $message = "Email already exists";
    }
    else
    {
        // If input is accepted, hass password and insert to user table
        $check = true;
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $command = "INSERT INTO user (userName, password, email) VALUES (?,?,?)";
        $stmt = $dbh -> prepare ($command);
        $params = [$username, $hashPassword, $email];
        $success = $stmt ->execute($params);

        // Declare username for session
        $_SESSION['username'] = $username;
        
    }
}
else{
    $message = "Connection error";
}

if($check){
    $result = [$check,$_SESSION['username'],$username,$password,$email];
}
else{
    $result = [$check,$message];
}
// Return array
echo json_encode($result);
