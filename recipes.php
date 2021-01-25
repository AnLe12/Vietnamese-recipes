

<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file is for recipes page when session is set */


session_start();
// Check whether the session for username is available. 
$access = isset($_SESSION["username"]);
?><!DOCTYPE html>
<html>
    <head>
        <title>Recipe</title>
        <link rel="stylesheet" type="text/css" href="css/recipesPage.css">
        <script src="js/recipeAction.js"></script>
    </head>


    <body>
        
        <?php
        if($access){
            include 'header.php';
            ?>
                <div id = "recipesList">
                    <div class="parent">

                    </div> <!-- end parent -->
                </div>
            <?php
            include 'footer.php';
        }
        else{
            ?>
            <h1>Connection error</h1>
            <a href="loginForm.html">Try again</a>
    <?php
        }
    ?>

    </body>

</html>
