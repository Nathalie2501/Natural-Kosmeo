<?php
// loads the model linked to the DAO
require('modele/Materiel.class.php');

// dao method declaration with object $ materiel as argument
class DaoMateriel{

	public function addMateriel($materiel) {

		$donnees = DB::select('INSERT INTO materiel(nom) VALUES (?)',
 			array($NewMateriel->getNom()
 				
 				
				
 		));
 		if(!empty($donnees)) {
 			$NewMateriel = new materiel($donnees['nom'],$_SESSION['id']);
 		}
 //get the id of the created NewMateriel in the insert
 		$NewMateriel->setId(DB::lastId());
 		
 		return $NewMateriel;
	}

}