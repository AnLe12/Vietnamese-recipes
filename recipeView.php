
<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file is for home page when session is set
 */
session_start();
// Check whether the session for username is available. 
$access = isset($_SESSION["username"]);
include 'connect.php';
// Get imageURL from link. 
$imageURL = filter_input(INPUT_GET,"imageURL");
// Prepare query to display the view of recipe and execute it.
$command = "SELECT * FROM recipe WHERE imageURL =?" ;
$stmt = $dbh -> prepare($command);
$param = [$imageURL];
$success = $stmt ->execute($param);

$recipe = $stmt -> fetch();
// If the username is avalable, display website.
if($access){
    include 'header.php';
    // Assign the data when fetch the value in recipe table and save it in session
    $_SESSION['recipeId'] = $recipe[0];
    $_SESSION['recipeName'] = $recipe[1];
    $_SESSTION['ingredient'] = $recipe[2];
    $_SESSTION['description']=$recipe[3];
    $_SESSION['imageURL'] = $recipe[4];
?><!DOCTYPE html>
<html>
    <head>
        <title><?php $recipe[1] ?></title>
        <link rel="stylesheet" type="text/css" href="css/recipesViewPage.css">
        <script src="js/recipeViewAction.js"></script>
    </head>
    <body>
        <br>
        <h1><?= $_SESSION["recipeName"] ?></h1>

        <img id="foodPic" src="<?php echo $_SESSION['imageURL']; ?>" alt="picture">
        <h2>Ingredient</h2>
        <p>
            <?= $_SESSTION['ingredient'] ?>
        </p>

        <h2>Description</h2>
        <p>
            <?= $_SESSTION['description'] ?>
        </p>

        <!-- Comment part -->
        <div class="commentFormContainer">
            <div id = "commentPart">
                <img id= 'cmtPic' src="images/commentLogo.png" alt="comment">
                <h3 id="cmtWord">Comment</h3>
            </div>
            <div id = "message2">
            </div>

            <div id="output">
                
            </div>

            <form id="commentForm">
                <div class="inputRow" id="userComment">
                        <input type='hidden' id='user' value='<?=$_SESSION["username"]?>'>
                        <h3>User: 
                            <?= $_SESSION['username']?>
                        </h3>
                        <textarea class="inputField" type="text" name="comment" id="comment" placeholder="Add a Comment"></textarea>
                        <input type="button" class="submitBtn" id="submitButton" value="Add">
                </div>
                <div class="inputRow">
                    
                </div>
                <div>
                    
                    <div id="commentMessage"></div>
                </div>
            </form>
        </div>
        
    </body>



<?php
}else{}
?>