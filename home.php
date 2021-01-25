


<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file is for home page when session is set */

session_start();
// Check whether the session for username is available. 
$access = isset($_SESSION["username"]);
?><!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>
    <!-- If the session is available, display the contents.-->
    <?php
    if ($access) {
        include 'header.php';
    ?>
        
                
                <div id = "intro">
                    <h3>Welcome to Home Kitchen</h3>
                    <p>&#8226; The characteristics of Vietnamese cuisine are shown through the unique cooking method,
                        the combination of ingredients or the way to taste spices.</p><br>
                    <p>&#8226; It is really honored to share the recipes, the secrets to processing Vietnamese food</p><br>
                </div>

                <!--Gallery-->
                <nav class="food"><h3>Gallery</h3></nav>
                <div class="parent">
                    <div class="one">
                        <figure>
                            <img src="images/pho.jpg" alt="Photo of food">
                        </figure>
                    </div>
                    
                    <div class="one">
                        <figure>
                            <img src="images/banhMi.jpg" alt="Photo of food">
                        </figure>
                    </div>	
                    
                    <div class="one">
                        <figure>
                            <img src="images/banhCuon.jpg" alt="Photo of food">
                        </figure>
                    </div>		
                
                    <div class="one">
                        <figure>
                            <img src="images/bunCha.jpg" alt="Photo of food">
                        </figure>
                    </div>			
                    
                </div> <!-- end parent -->
                <!--End of Gallery-->
                
    <?php
        include 'footer.php';
    } 
    else {
                header('location: index.html');
                
    }
    ?>
</body>

</html>