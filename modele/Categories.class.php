<?php
//Declaration of the object Materiel (table categories of the database natural_kosmeo) with inheritance (copy / paste) of the abstract class AbstractEntity (function getId to retrieve the id)
class Categories extends AbstractEntity{
	private $nom;
	private $img;
	private $description;
//Declaration of the constructor with its arguments (parameters) that refer to the attributes (properties)
	public function __construct($nom, $img, $description){

// $ this refers to the instance of the object (new Object () => in Etapes.ctrl.php we declare the request (loadDao) which will fetch the info in the bdd / delete them / ...		
		$this->nom = $nom;
		$this->img = $img;
		$this->description = $description;
		
	}

//Getter (it can read an attibut)
	//getter = returns the value of the attribute

	public function getNom() {
		return $this->nom;
	}
// Setter (it allows to write an attribute)//check the value of the attribute (here nom)

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}


	public function getImg() {
		return $this->img;
	}

	public function setImg($img) {
		$this->img = $img;
	}
}


?>