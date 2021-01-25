<?php
/**Thi Hoai An Le 000798006
 * December 10 2020
 * This file displa comments
 */
session_start();
include 'connect.php';
//Check whether username is available.
$access = isset($_SESSION["username"]);
if($access){
    //Prepare the query and execute it
    $command = "SELECT * FROM communication WHERE recipeID=?";
    $stmt = $dbh -> prepare($command);
    $param = [$_SESSION["recipeId"]];
    $success = $stmt ->execute($param);

    $commentList=[];
    // push the comment in output array
    while($row = $stmt -> fetch()){
        array_push($commentList,$row);
    }
}
else{
    echo('Connection Error');

}
echo json_encode($commentList);


