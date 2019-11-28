<?php 
// Declaration of the object Tutos (table tutos of the database natural_kosmeo) with inheritance (copy / paste) of the abstract class AbstractEntity (function getId to retrieve the id)
class Tutos extends AbstractEntity {
// Declaration of attributes (properties of tutorials)

	private $nom;
	private $description;
	private $img;
	private $fk_categories;
	private $fk_users;

	
//Declaration of the constructor with its arguments (parameters) that refer to the attributes (properties)
	public function __construct($nom,$description,$img,$fk_categories,$fk_users) {
// $ this refers to the instance of the object (new Object () => in Tutos.ctrl.php we declare the request (loadDao) which will fetch the info in the bdd / delete them / ...
		$this->nom = $nom;
		$this->description = $description;
		$this->img = $img;
		$this->fk_categories = $fk_categories;
		$this->fk_users = $fk_users;
}


 //Getter (it can read an attibut)
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

	public function getFk_categories() {
		return $this->fk_categories;
	}
	public function setFk_categories($fk_categories) {
		$this->fk_categories = $fk_categories;
	}

	public function getFk_users() {
		return $this->fk_users;
	}
	public function setFk_users($fk_users) {
		$this->fk_users = $fk_users;
	}
}

 ?>