<?php
// loads the model linked to the DAO
require('modele/Recherches.class.php');

// dao method declaration with object $recherches as argument
class DaoRecherches{

	public function read ($recherches) {

		$donnees = DB::select('SELECT id, nom, description FROM tutos WHERE MATCH (nom, description) AGAINST (? WITH QUERY EXPANSION)',array());

		if (!empty($donnees)) {
 			$recherches = new Recherches($donnees['nom'],$donnees['description']);
 			

 			$recherches->setId($donnees['id']);

 			return $recherches;
 		} else {
 			return null;
 		}	
 	}
}
?>