
<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file add comments */
    include 'connect.php';
    include 'recipeClass.php';

    //Prepare the query and execute it
    $command = "SELECT * FROM recipe";
    $stmt = $dbh->prepare($command);
    $success =  $stmt->execute();
    //Access recipe table in database and take recipes as Recipe object and put them in the array.
    $recipeList = [];
    if($success){
        while($row = $stmt -> fetch()){
            $recipe = new Recipe($row['recipeId'], $row['recipeName'], $row['ingredient'], $row['description'], $row['imageURL']);
            array_push($recipeList, $recipe);
            echo($recipe);        }
        echo("success");
    }

   
echo json_encode($recipeList);
?>