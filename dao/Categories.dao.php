<?php
// loads the model linked to the DAO
require('modele/Categories.class.php');
// dao method declaration with object $ categories as argument
class DaoCategories {

// if the variable $ data returns a result (that the table of a category has been clicked by the selected user contains something), return if not return null
	public function read($id) {
 		$donnees = DB::select('SELECT * FROM categories WHERE id = ?',array($id));
 		if (!empty($donnees)) {
 			$categories = new Categories($donnees['nom'],$donnees['img'],$donnees['description']);
 			$categories->setId($donnees['id']);

 			return $categories;
 		} else {
 			return null;
 		}	
 	}


public function AjoutTutoCat () {

}


public function readAll() {

//if the var data (selects me all categories) contains data sends to the controller
// information sent to the view so that it is displayed -> in the view we will display everything in the categories. the controller retrieves the data from the readAll and asks the page Tutos, index to manage the information to display them
// Linked to tutos ctrl index
 		$donnees = DB::select('SELECT * FROM categories');
 		$tabCategorie = array();
 	
 		if (!empty($donnees)) {
 			foreach ($donnees as $key => $donnee) {
	 			$tabCategorie[$key] = new Categories($donnee['nom'],$donnee['img'],$donnee['description']);
	 			$tabCategorie[$key]->setId($donnee['id']);
 			}

 			return $tabCategorie;
 		} else {
 			return null;
 		}	
 	}
 }
?>