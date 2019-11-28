<?php
// loads the model linked to the DAO
require('modele/Ingredient.class.php');
// dao method declaration with object $ingredient as argument
class DaoIngredient{

	public function addIngredient($ingredient) {

		$donnees = DB::select('INSERT INTO ingredient(nom,unites,quantites) VALUES (?,?,?)',
 			array($NewIngredient->getNom(),
 				  $NewIngredient->getUnites(),
 				  $NewIngredient->getQuantites(),
 				
				
 		));
 		if(!empty($donnees)) {
 			$NewIngredient = new Ingredient($donnees['nom'],$donnees['unites'],$donnees['quantites'],$_SESSION['id']);
 		}
 //get the id of the created Ingredient in the insert
 		$NewIngredient->setId(DB::lastId());
 		
 		return $NewIngredient;
	}


}