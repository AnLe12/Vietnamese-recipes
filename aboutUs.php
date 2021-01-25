<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file is for About Us page when session is set */

session_start();
// Check whether the session for username is available. 
$access = isset($_SESSION["username"]);
?><!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/aboutUs.css">
</head>

<body>
    <!-- If the session is available, display the contents.-->
    <?php
    if ($access) {
        include 'header.php';
    ?>
<div id='content'>

<h1 id='aBheader'>Our mission is to share recipes and make cooking funner</h1>
<p id = "textAB">Cooking plays an important role in healthy and happy life. Home kitchen is a platform to share the recipe about Vietnamese cuisine.</p>
<img src="images/aboutUs.jpg" alt="Photo of food">
</div>
<?php
        include 'footer.php';
    } 
    else {
                header('location: index.html');
                
    }
    ?>
</body>

</html>