


<?php 
require('modele/Tutos.class.php');

class DaoTutos {
//if the user clicks add tuto in the chosen category, sends the info to the controller (if that order has been given by him) for him to process and send to the view that will display them
 public function create($NewTutos) {
 		DB::select('INSERT INTO tutos(nom,description,img,fk_categories,fk_users) VALUES (?,?,?,?,?)',
 			array($NewTutos->getNom(),
 				$NewTutos->getDescription(),
 				$NewTutos->getImg(),
 				$NewTutos->getFk_categories(),
				$NewTutos->getFk_users()
				
 		));
 		
 //get the id of the tuto created  in the insert into

 		$NewTutos->setId(DB::lastId());
 		
 		return $NewTutos;
	}
 	
//read and recover tutos data according to the id
 	
 	public function read($id) {
 		$donnees = DB::select('SELECT * FROM tutos WHERE id = ?',array($id));

//if the data variable (SELECT * FROM tutos WHERE id =?) is not empty, then the tutorials (id tuto) have been chosen (the user has clicked on the selected tuto, you give the controller the data of the tutorials for that he displays them (if the order of the controller was that one)
 	if (!empty($donnees)) {
			$tutos = new Tutos($donnees['nom'],$donnees['description'],$donnees['img'],$donnees['fk_categories'],$donnees['fk_users']);
			$tutos->setId($donnees['id']);
//return the object $ tutorials

			return $tutos;

//otherwise no tutorials displayed in the chosen category

		} else {
			return null;
		}
	}
 		

 	public function readAll() {
 		$donnees = DB::select('SELECT * FROM tutos ORDER BY id DESC');
 		$tabTutos = array();
 	
 		if (!empty($donnees)) {
 			foreach ($donnees as $key => $donnee) {
	 			$tabTutos[$key] = new Tutos($donnee['nom'],$donnee['description'],$donnee['img'],$donnee['fk_categories'],$donnee['fk_users']);
	 			$tabTutos[$key]->setId($donnee['id']);
 			}

 			return $tabTutos;
 		} else {
 			return null;
 		}	
 	}

 	public function readAllByCat($id) {
 			$donnees = DB::select ('SELECT * FROM tutos WHERE fk_categories = ?', array($id));

	$tabTutos = array();
 		if(!empty($donnees)){
 		foreach ($donnees as $key => $donnee) {

 		$tabTutos[$key] = new Tutos(
 					$donnee['nom'],$donnee['description'],$donnee['img'],$donnee['fk_categories'],$donnee['fk_users']);
 				$tabTutos[$key]->setId($donnee['id']);
 				}
			return $tabTutos;
		} else {
			return null;
		}
 				
}

/*public function readAllTutos($id) {
 		$donnees = DB::select('SELECT * FROM etapes WHERE fk_tutos = ?',array($id));

//if the data variable (SELECT * FROM tutos WHERE id =?) is not empty, then the tutorials (id tuto) have been chosen (the user has clicked on the selected tutorials, you give the controller the data of the tutorials for that he displays them (if the order of the controller was that one)
 	if (!empty($donnees)) {
			$AllTutos = new Etapes1($donnees['nom'],$donnees['description'],$donnees['img'],$donnees['fk_tutos']);
			$tutos->setId($donnees['id']);

			return $AllTutos;


		} else {
			return null;
		}
	}*/
	
	public function update() {}

 	public function delete() {}
 }


?>