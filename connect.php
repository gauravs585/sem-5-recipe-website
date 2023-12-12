<?php
	$recipe_name = $_POST['recipe_name'];
	$recipe_ingredients= $_POST['recipe_ingredients'];
	$recipe_method = $_POST['recipe_method'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		//echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into recipe(recipe_name, recipe_ingredient, recipe_method ) values(?, ?, ?)");
		$stmt->bind_param("sss", $recipe_name, $recipe_ingredient, $recipe_method );
		$stmt->execute();
		echo $execval;
		echo "Recipe added successfully...";
		$stmt->close();
		$conn->close();
	}
?>