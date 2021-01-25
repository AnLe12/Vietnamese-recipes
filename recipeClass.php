

<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file creates the Recipe Class */
class Recipe implements JsonSerializable{
    // Declare the variable
    private $recipeId;
    private $recipeName;
    private $ingredient;
    private $description;
    private $imageURL;

    //Create a recipe constructor for this class
    function __construct($recipeId,$recipeName,$ingredient,$description,$imageURL)
    {
        $this-> recipeId = $recipeId;
        $this -> recipeName = $recipeName;
        $this -> ingredient = $ingredient;
        $this -> description = $description;
        $this -> imageURL = $imageURL;
        
    }
    public function __toString()
    {
        return $this -> recipeName;
    }
    //Create a function to get object by json.
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>