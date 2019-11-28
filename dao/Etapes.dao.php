<?php

// loads the model linked to the DAO
require_once('modele/Etapes.class.php');
// dao method declaration with object $etapes as argument
class DaoEtapes {
	public function addEtapes($NewEtapes) {

		$donnees = DB::select('INSERT INTO etapes(nom,description,img,fk_tutos) VALUES (?,?,?,?)',
			array($NewEtapes->getNom(),
				$NewEtapes->getDescription(),
				$NewEtapes->getImg(),
				$NewEtapes->getFk_tutos()		
			));
 //get the id of the created NewEtapes in the insert
		$NewEtapes->setId(DB::lastId());
		
		return $NewEtapes;
	}


	

	public function readAllByTutos($id){

		$donnees = DB::select ('SELECT * FROM etapes WHERE fk_tutos = ?', array($id));

		$tabEtapes = array();
		if(!empty($donnees)){
			foreach ($donnees as $key => $donnee) {

				$tabEtapes[$key] = new Etapes(
					$donnee['nom'],$donnee['description'],$donnee['img'],$donnee['fk_users'],$donnee['fk_tutos']);
				$tabEtapes[$key]->setId($donnee['id']);
			}
			return $tabEtapes;
		} else {
			return null;
		}
		
	}

}



?>