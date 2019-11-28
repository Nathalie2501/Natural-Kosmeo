<?php


class Recherches extends AbstractEntity{
	private $nom;
	private $description;
	

	public function __construct($nom, $description){
		$this->nom = $nom;
		
		$this->description = $description;
		
	}


	public function getNom() {
		return $this->nom;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le nom du tutos
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

}
?>
