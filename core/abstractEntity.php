<?php 
//super class ( l' id ne change jamais) => le méthode sera récupérée par la fonction getId User dans le modèle

//super class (the id never changes) => the method will be retrieved by the function getId User in the model * /
abstract class AbstractEntity {
	protected $id;

//fonction qui déclare la méthode pour mettre à jour l'id et l'envoyer au getId dans le modèle (fonction getId dans le modèle)

//function that declares the method to update the id and send it to the getId in the template (getId function in the template)
	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}
	

	
}

 ?>