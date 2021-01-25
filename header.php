<!DOCTYPE html>
<?php
/** Thi Hoai An Le 000798006
 *December 10 2020
 *This file is for header page when session is set */
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/header.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    // Check whether the session for username is available. 
    if ($access) {
    ?>
        <header>
            <div id = "logoHeader">
                <image id = "logo" src="images/logo.png" alt = "Photo of my webpage"></image>
            </div>
            <div>
                <!--Navigation-->
                <div class="begin">
                    <a id ="homePage" href="home.php">Home</a>
                    <a id ="recipesPage" href="recipes.php">Recipes</a>
                    <a id ="aboutUsPage" href="aboutUs.php">About Us</a>
                    <div id="userbox">
                         Hello <?= $_SESSION["username"] ?><a href="logOut.php">Log out</a>
                        
                    </div>
                </div>
                <!--End Navigation-->
            </div>
        </header>
    <?php
    }
    ?>

